<?php

namespace QBNK\QBank\API;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\CacheProvider;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use QBNK\QBank\API\Controller\AccountsController;
use QBNK\QBank\API\Controller\CategoriesController;
use QBNK\QBank\API\Controller\DeploymentController;
use QBNK\QBank\API\Controller\EventsController;
use QBNK\QBank\API\Controller\FiltersController;
use QBNK\QBank\API\Controller\FoldersController;
use QBNK\QBank\API\Controller\MediaController;
use QBNK\QBank\API\Controller\MoodboardsController;
use QBNK\QBank\API\Controller\ObjecttypesController;
use QBNK\QBank\API\Controller\PropertysetsController;
use QBNK\QBank\API\Controller\SearchController;
use QBNK\QBank\API\Controller\SocialmediaController;
use QBNK\QBank\API\Controller\TemplatesController;
use QBNK\QBank\API\Controller\WebhooksController;
use Sainsburys\Guzzle\Oauth2\AccessToken;
use Sainsburys\Guzzle\Oauth2\GrantType\PasswordCredentials;
use Sainsburys\Guzzle\Oauth2\GrantType\RefreshToken;
use Sainsburys\Guzzle\Oauth2\Middleware\OAuthMiddleware;

/**
 * This is the main class to instantiate and use when communicating with QBank.
 *
 * All the different parts of the API are accessible via the methods which are returning controllers.
 *
 * Built against QBank API v.1 and Swagger v.1.1
 */
class QBankApi
{
    /** @var LoggerInterface */
    protected $logger;

    /** @var string */
    protected $basepath;

    /** @var Credentials */
    protected $credentials;

    /** @var Cache|null */
    protected $cache;

    /** @var CachePolicy */
    protected $cachePolicy;

    /** @var Client */
    protected $client;

    /** @var OAuthMiddleware */
    protected $oauth2Middleware;

    /** @var bool */
    protected $verifyCertificates;

    /** @var AccountsController */
    protected $accounts;

    /** @var CategoriesController */
    protected $categories;

    /** @var DeploymentController */
    protected $deployment;

    /** @var EventsController */
    protected $events;

    /** @var FiltersController */
    protected $filters;

    /** @var FoldersController */
    protected $folders;

    /** @var MediaController */
    protected $media;

    /** @var MoodboardsController */
    protected $moodboards;

    /** @var ObjecttypesController */
    protected $objecttypes;

    /** @var PropertysetsController */
    protected $propertysets;

    /** @var SearchController */
    protected $search;

    /** @var SocialmediaController */
    protected $socialmedia;

    /** @var TemplatesController */
    protected $templates;

    /** @var WebhooksController */
    protected $webhooks;

    /**
     * @param string      $qbankURL    the URL to the QBank API
     * @param Credentials $credentials the credentials used to connect
     * @param array       $options     Associative array containing options.
     *                                 <ul>
     *                                 <li>Cache $options[cache] A cache implementation to store tokens and responses in. Highly recommended.</li>
     *                                 <li>QBankCachePolicy $options[cachePolicy] A policy on how to use caching for API queries, if not provided cache will not be available for API queries.</li>
     *                                 <li>LoggerInterface $options[log] A PSR-3 log implementation.</li>
     *                                 <li>bool $options[verifyCertificates] Whether to verify certificates for https connections. Defaults to true.</li>
     *                                 </ul>
     *
     * @throws \LogicException
     */
    public function __construct($qbankURL, Credentials $credentials, array $options = [])
    {
        // Setup logging
        if (!empty($options['log']) && $options['log'] instanceof LoggerInterface) {
            $this->logger = $options['log'];
        } else {
            $this->logger = new NullLogger();
        }

        $this->basepath = $this->buildBasepath($qbankURL);

        // Store credentials for later use
        $this->credentials = $credentials;

        // Optionaly setup cache
        if (!empty($options['cache']) && $options['cache'] instanceof Cache) {
            $this->cache = $options['cache'];
            if ($this->cache instanceof CacheProvider && !$this->cache->getNamespace()) {
                $this->cache->setNamespace(md5($this->basepath . $this->credentials->getUsername() . $this->credentials->getPassword()));
            }
        } else {
            $this->logger->notice('No caching supplied! Without caching both performance and security is reduced.');
        }

        // Setup the cache policy
        if (!empty($options['cachePolicy']) && $options['cachePolicy'] instanceof CachePolicy) {
            $this->cachePolicy = $options['cachePolicy'];
            if (!($this->cache instanceof Cache) && $this->cachePolicy->isEnabled()) {
                throw new \LogicException(
                    'You have supplied a cache policy that says cache is enabled but no cache provider have been defined.'
                );
            }
        } else {
            $this->cachePolicy = new CachePolicy(false, 0);
            $this->logger->warning('No cache policy supplied! Without a cache policy no API queries will be cached.');
        }

        if (isset($options['verifyCertificates'])) {
            $this->verifyCertificates = (bool) $options['verifyCertificates'];
        } else {
            $this->verifyCertificates = true;
        }
    }

    /**
     * Ensures that any existing tokens are saved for future use.
     */
    public function __destruct()
    {
        if ($this->oauth2Middleware instanceof OAuthMiddleware) {
            try {
                $accessToken = $this->oauth2Middleware->getAccessToken();
                $refreshToken = $this->oauth2Middleware->getRefreshToken();
                $this->setTokens($accessToken, $refreshToken);
            } catch (\Exception $e) {
                $this->logger->warning('Could not store tokens: ' . $e->getMessage());
            }
        }
    }

    /**
     * Accounts control the security in QBank.
     *
     * @return AccountsController
     */
    public function accounts()
    {
        if (!$this->accounts instanceof AccountsController) {
            $this->accounts = new AccountsController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->accounts->setLogger($this->logger);
        }

        return $this->accounts;
    }

    /**
     * Categories defines which PropertySets should be available for Media. All Media belongs to exactly one Category.
     *
     * @return CategoriesController
     */
    public function categories()
    {
        if (!$this->categories instanceof CategoriesController) {
            $this->categories = new CategoriesController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->categories->setLogger($this->logger);
        }

        return $this->categories;
    }

    /**
     * DeploymentSites are places where Media from QBank may be published to, to allow public access. Protocols define the way the publishing executes.
     *
     * @return DeploymentController
     */
    public function deployment()
    {
        if (!$this->deployment instanceof DeploymentController) {
            $this->deployment = new DeploymentController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->deployment->setLogger($this->logger);
        }

        return $this->deployment;
    }

    /**
     * Class Events.
     *
     * @return EventsController
     */
    public function events()
    {
        if (!$this->events instanceof EventsController) {
            $this->events = new EventsController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->events->setLogger($this->logger);
        }

        return $this->events;
    }

    /**
     * Filters are used for filtering media by its folder, category or a specific property.
     *
     * @return FiltersController
     */
    public function filters()
    {
        if (!$this->filters instanceof FiltersController) {
            $this->filters = new FiltersController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->filters->setLogger($this->logger);
        }

        return $this->filters;
    }

    /**
     * Folders are used to group Media in a hierarchial manner.
     *
     * @return FoldersController
     */
    public function folders()
    {
        if (!$this->folders instanceof FoldersController) {
            $this->folders = new FoldersController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->folders->setLogger($this->logger);
        }

        return $this->folders;
    }

    /**
     * A Media is any uploaded file in QBank. A Media belongs to a Category and may have customer defined Properties.
     *
     * @return MediaController
     */
    public function media()
    {
        if (!$this->media instanceof MediaController) {
            $this->media = new MediaController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->media->setLogger($this->logger);
        }

        return $this->media;
    }

    /**
     * Moodboards are public, usually temporary, areas used to expose Media in QBank. Any Media may be added to a Moodboard, which any outside user may then access until the Moodboard expiration date is due. Moodboards can be templated in different ways to fit many purposes.
     *
     * @return MoodboardsController
     */
    public function moodboards()
    {
        if (!$this->moodboards instanceof MoodboardsController) {
            $this->moodboards = new MoodboardsController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->moodboards->setLogger($this->logger);
        }

        return $this->moodboards;
    }

    /**
     * Object types define sets of propertySets that can be applied to any Object of the corresponding object type class, such as a Media or a Folder.
     *
     * @return ObjecttypesController
     */
    public function objecttypes()
    {
        if (!$this->objecttypes instanceof ObjecttypesController) {
            $this->objecttypes = new ObjecttypesController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->objecttypes->setLogger($this->logger);
        }

        return $this->objecttypes;
    }

    /**
     * PropertySets groups Properties together.
     *
     * @return PropertysetsController
     */
    public function propertysets()
    {
        if (!$this->propertysets instanceof PropertysetsController) {
            $this->propertysets = new PropertysetsController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->propertysets->setLogger($this->logger);
        }

        return $this->propertysets;
    }

    /**
     * @return SearchController
     */
    public function search()
    {
        if (!$this->search instanceof SearchController) {
            $this->search = new SearchController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->search->setLogger($this->logger);
        }

        return $this->search;
    }

    /**
     * SocialMedia are places where Media from QBank may be published to, to allow public access. Protocols define the way the publishing executes.
     *
     * @return SocialmediaController
     */
    public function socialmedia()
    {
        if (!$this->socialmedia instanceof SocialmediaController) {
            $this->socialmedia = new SocialmediaController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->socialmedia->setLogger($this->logger);
        }

        return $this->socialmedia;
    }

    /**
     * @return TemplatesController
     */
    public function templates()
    {
        if (!$this->templates instanceof TemplatesController) {
            $this->templates = new TemplatesController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->templates->setLogger($this->logger);
        }

        return $this->templates;
    }

    /**
     * Connect your applications with QBank through webhooks.
     *
     * @return WebhooksController
     */
    public function webhooks()
    {
        if (!$this->webhooks instanceof WebhooksController) {
            $this->webhooks = new WebhooksController($this->getClient(), $this->cachePolicy, $this->cache);
            $this->webhooks->setLogger($this->logger);
        }

        return $this->webhooks;
    }

    /**
     * Create a basepath for all api calls from the supplied URL.
     *
     * @param string $url
     *
     * @return string
     */
    protected function buildBasepath($url)
    {
        if (!preg_match('#(\w+:)?//#', $url)) {
            $url = '//' . $url;
        }

        $urlParts = parse_url($url);

        if (false === $urlParts) {
            throw new \InvalidArgumentException('Could not parse QBank URL.');
        }

        // Default to HTTPS
        if (empty($urlParts['scheme'])) {
            $urlParts['scheme'] = 'https';
        }

        // Add the api path automatically if omitted for qbank.se hosted QBank instances
        if ((empty($urlParts['path']) || '/' == $urlParts['path'])
            && 'qbank.se' == substr($urlParts['host'], -strlen('qbank.se'))) {
            $urlParts['path'] = '/api/';
        }

        // Pad the end of the path with a slash
        if ('/' != substr($urlParts['path'], -1)) {
            $urlParts['path'] .= '/';
        }

        return $urlParts['scheme'] . '://' . $urlParts['host'] . (!empty($urlParts['port']) ? ':' . $urlParts['port'] : '') . $urlParts['path'];
    }

    /**
     * Gets the Guzzle client instance used for making calls.
     *
     * @return Client
     */
    protected function getClient()
    {
        if (!($this->client instanceof Client)) {
            $handlerStack = HandlerStack::create();
            $handlerStack = $this->withOAuth2MiddleWare($handlerStack);
            $this->client = new Client([
                'handler' => $handlerStack,
                'auth' => 'oauth2',
                'base_uri' => $this->basepath,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                    'User-Agent' => 'qbank3api-phpwrapper/2 (qbankapi: 1; swagger: 1.1)',
                ],
                'verify' => $this->verifyCertificates,
                'allow_redirects' => [
                    'max' => 5,
                    'strict' => true,
                    'referer' => false,
                    'protocols' => ['http', 'https'],
                    'track_redirects' => false,
                ],
            ]);

            $this->logger->debug('Guzzle client instantiated.', ['basepath' => $this->basepath]);
        }

        return $this->client;
    }

    /**
     * Adds the OAuth2 middleware to the handler stack.
     *
     * @return HandlerStack
     */
    protected function withOAuth2MiddleWare(HandlerStack $stack)
    {
        if (!($this->oauth2Middleware instanceof OAuthMiddleware)) {
            $this->oauth2Middleware = $this->getOAuthMiddleware();

            $tokens = $this->getTokens();
            if (!empty($tokens['accessTokens'])) {
                $this->oauth2Middleware->setAccessToken($tokens['accessTokens']);
            }
            if (!empty($tokens['refreshTokens'])) {
                $this->oauth2Middleware->setRefreshToken($tokens['refreshTokens']);
            }
        }

        $stack->push($this->oauth2Middleware->onBefore());
        $stack->push($this->oauth2Middleware->onFailure(3));

        return $stack;
    }

    /**
     * Configures the OAUth middleware.
     *
     * @return OAuthMiddleware
     */
    protected function getOAuthMiddleware(): OAuthMiddleware
    {
        $oauthClient = new Client([
            'base_uri' => $this->basepath,
            'verify' => $this->verifyCertificates,
            'headers' => [
                'User-Agent' => 'qbank3api-phpwrapper/2 (qbankapi: 1; swagger: 1.1)',
            ],
        ]);
        $config = [
            PasswordCredentials::CONFIG_USERNAME => $this->credentials->getUsername(),
            PasswordCredentials::CONFIG_PASSWORD => $this->credentials->getPassword(),
            PasswordCredentials::CONFIG_CLIENT_ID => $this->credentials->getClientId(),
            PasswordCredentials::CONFIG_TOKEN_URL => 'oauth2/token',
        ];
        $oauth2Middleware = new OAuthMiddleware(
        $oauthClient,
            new PasswordCredentials($oauthClient, $config),
            new RefreshToken($oauthClient, $config)
        );

        return $oauth2Middleware;
    }

    /**
     * Changes the credentials used to authenticate with QBank.
     *
     * Changing the credentials will effectively switch the user using QBank and is useful when implementing some tiered
     * service.
     *
     * @param string $user     username of the new user
     * @param string $password password of the new user
     */
    public function updateCredentials($user, $password)
    {
        $oldUser = $this->credentials->getUsername();
        $this->credentials = new Credentials($this->credentials->getClientId(), $user, $password);
        unset($password);
        if ($this->client instanceof Client) {
            $this->client = $this->oauth2Middleware = null;
            $this->client = $this->getClient();
        }
        if ($this->cache instanceof CacheProvider) {
            $this->cache->setNamespace(md5($this->basepath . $this->credentials->getUsername() . $this->credentials->getPassword()));
        }
        $this->logger->notice('Updated user!', ['old' => $oldUser, 'new' => $user]);
    }

    /**
     * Sets the tokens used for authentication.
     *
     * This is normally done automatically, but exposed for transparency reasons.
     *
     * @param AccessToken      $accessToken
     * @param AccessToken|null $refreshToken
     */
    public function setTokens(AccessToken $accessToken, AccessToken $refreshToken = null)
    {
        if (!($this->oauth2Middleware instanceof OAuthMiddleware)) {
            $this->oauth2Middleware = $this->getOAuthMiddleware();
        }

        if ($accessToken instanceof AccessToken && false === $accessToken->isExpired()) {
            if ($this->cache instanceof Cache) {
                $this->cache->save(
                    'oauth2accesstoken',
                    serialize($accessToken),
                    $accessToken->getExpires()->getTimestamp() - (new \DateTime())->getTimestamp()
                );
            }
            $this->oauth2Middleware->setAccessToken($accessToken);
        }
        if ($refreshToken instanceof AccessToken && false === $accessToken->isExpired()) {
            if ($this->cache instanceof Cache) {
                $this->cache->save(
                    'oauth2refreshtoken',
                    serialize($refreshToken),
                    $refreshToken->getExpires() instanceof \DateTime ?
                        $refreshToken->getExpires()->getTimestamp() - (new \DateTime())->getTimestamp() :
                        3600 * 24 * 13
                );
            }
            $this->oauth2Middleware->setRefreshToken($refreshToken);
        }
    }

    /**
     * Gets the token used for authentication.
     *
     * @return array ['accessToken' => AccessToken|null, 'refreshToken' => RefreshToken|null]
     */
    public function getTokens()
    {
        $tokens = ['accessToken' => null, 'refreshToken' => null];
        if ($this->oauth2Middleware instanceof OAuthMiddleware) {
            $tokens['accessToken'] = $this->oauth2Middleware->getAccessToken();
            $tokens['refreshToken'] = $this->oauth2Middleware->getRefreshToken();
        }
        if ($this->cache instanceof Cache && empty($tokens['accessToken']) && $this->cache->contains('oauth2accesstoken')) {
            $tokens['accessToken'] = unserialize($this->cache->fetch('oauth2accesstoken'));
        }
        if ($this->cache instanceof Cache && empty($tokens['accessToken']) && $this->cache->contains('oauth2refreshtoken')) {
            $tokens['refreshToken'] = unserialize($this->cache->fetch('oauth2refreshtoken'));
        }
        if (empty($tokens['accessToken'])) {
            $response = $this->getClient()->get('/');      // Trigger call to get a token. Don't care about the result.
            $tokens['accessToken'] = $this->oauth2Middleware->getAccessToken();
            $tokens['refreshToken'] = $this->oauth2Middleware->getRefreshToken();
        }

        return $tokens;
    }
}
