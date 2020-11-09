<?php

namespace QBNK\QBank\API\Model;

class MediaUsage implements \JsonSerializable
{
    /** @var int */
    protected $mediaId;
    /** @var string */
    protected $mediaUrl;
    /** @var string */
    protected $pageUrl;
    /** @var string[] */
    protected $context;
    /** @var string */
    protected $language;

    /**
     * Constructs a MediaUsage.
     *
     * @param array $parameters An array of parameters to initialize the {@link MediaUsage} with.
     *                          - <b>mediaId</b> -
     *                          - <b>mediaUrl</b> -
     *                          - <b>pageUrl</b> -
     *                          - <b>context</b> -
     *                          - <b>language</b> -
     */
    public function __construct($parameters = [])
    {
        $this->context = [];

        if (isset($parameters['mediaId'])) {
            $this->setMediaId($parameters['mediaId']);
        }
        if (isset($parameters['mediaUrl'])) {
            $this->setMediaUrl($parameters['mediaUrl']);
        }
        if (isset($parameters['pageUrl'])) {
            $this->setPageUrl($parameters['pageUrl']);
        }
        if (isset($parameters['context'])) {
            $this->setContext($parameters['context']);
        }
        if (isset($parameters['language'])) {
            $this->setLanguage($parameters['language']);
        }
    }

    /**
     * Gets the mediaId of the MediaUsage.
     * @return int	 */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * Sets the "mediaId" of the MediaUsage.
     *
     * @param int $mediaId
     *
     * @return MediaUsage
     */
    public function setMediaId($mediaId)
    {
        $this->mediaId = $mediaId;

        return $this;
    }

    /**
     * Gets the mediaUrl of the MediaUsage.
     * @return string	 */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * Sets the "mediaUrl" of the MediaUsage.
     *
     * @param string $mediaUrl
     *
     * @return MediaUsage
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;

        return $this;
    }

    /**
     * Gets the pageUrl of the MediaUsage.
     * @return string	 */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * Sets the "pageUrl" of the MediaUsage.
     *
     * @param string $pageUrl
     *
     * @return MediaUsage
     */
    public function setPageUrl($pageUrl)
    {
        $this->pageUrl = $pageUrl;

        return $this;
    }

    /**
     * Gets the context of the MediaUsage.
     * @return string[]	 */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Sets the "context" of the MediaUsage.
     *
     * @param string[] $context
     *
     * @return MediaUsage
     */
    public function setContext(array $context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Gets the language of the MediaUsage.
     * @return string	 */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Sets the "language" of the MediaUsage.
     *
     * @param string $language
     *
     * @return MediaUsage
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array an associative array of the available variables
     */
    public function jsonSerialize()
    {
        $json = [];

        if (null !== $this->mediaId) {
            $json['mediaId'] = $this->mediaId;
        }
        if (null !== $this->mediaUrl) {
            $json['mediaUrl'] = $this->mediaUrl;
        }
        if (null !== $this->pageUrl) {
            $json['pageUrl'] = $this->pageUrl;
        }
        if (null !== $this->context && !empty($this->context)) {
            $json['context'] = $this->context;
        }
        if (null !== $this->language) {
            $json['language'] = $this->language;
        }

        return $json;
    }
}
