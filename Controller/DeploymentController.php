<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\DeploymentSite;
use QBNK\QBank\API\Model\DeploymentSiteResponse;
use QBNK\QBank\API\Model\Protocol;

class DeploymentController extends ControllerAbstract
{
    /**
     * Lists all Protocols.
     *
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return Protocol[]
     */
    public function listProtocols(CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/deployment/protocols', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new Protocol($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific Protocol.
     *
     * @param int         $id          The Protocol identifier..
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return Protocol
     */
    public function retrieveProtocol($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/deployment/protocols/' . $id . '', $parameters, $cachePolicy);
        $result = new Protocol($result);

        return $result;
    }

    /**
     * Lists all DeploymentSites.
     *
     * Lists all DeploymentSites the current User has access to.
     *
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return DeploymentSiteResponse[]
     */
    public function listSites(CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/deployment/sites', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new DeploymentSiteResponse($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific DeploymentSite.
     *
     * @param int         $id          The DeploymentSite identifier..
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return DeploymentSiteResponse
     */
    public function retrieveSite($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/deployment/sites/' . $id . '', $parameters, $cachePolicy);
        $result = new DeploymentSiteResponse($result);

        return $result;
    }

    /**
     * Create a DeploymentSite.
     *
     * @param DeploymentSite $deploymentSite A JSON encoded DeploymentSite to create
     *
     * @return DeploymentSiteResponse
     */
    public function createSite(DeploymentSite $deploymentSite)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['deploymentSite' => $deploymentSite], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/deployment', $parameters);
        $result = new DeploymentSiteResponse($result);

        return $result;
    }

    /**
     * Update a DeploymentSite.
     *
     * @param int            $id             the DeploymentSite identifier
     * @param DeploymentSite $deploymentSite A JSON encoded DeploymentSite representing the updates
     *
     * @return DeploymentSiteResponse
     */
    public function updateSite($id, DeploymentSite $deploymentSite)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['deploymentSite' => $deploymentSite], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/deployment/' . $id . '', $parameters);
        $result = new DeploymentSiteResponse($result);

        return $result;
    }

    /**
     * Deploy Media to a DeploymentSite.
     *
     * Deploy Media to a DeploymentSite, this is an asynchronous method.
     *
     * @param int   $id       deploymentSite to deploy to
     * @param int[] $mediaIds an array of int values
     */
    public function addMediaToDeploymentSite($id, array $mediaIds)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['mediaIds' => $mediaIds], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/deployment/' . $id . '/media', $parameters);

        return $result;
    }

    /**
     * Delete a DeploymentSite.
     *
     * You can not delete a DeploymentSite while there are still media deployed there!
     *
     * @param int $id the DeploymentSite identifier
     *
     * @return DeploymentSiteResponse
     */
    public function removeSite($id)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/deployment/' . $id . '', $parameters);
        $result = new DeploymentSiteResponse($result);

        return $result;
    }

    /**
     * Undeploy Media from a DeploymentSite.
     *
     * Undeploy Media from a DeploymentSite, this is an asynchronous method.
     *
     * @param int    $id       deploymentSite to undeploy from
     * @param string $mediaIds a comma separated string of media ids we should undeploy
     *
     * @return array
     */
    public function removeMediaFromDeploymentSite($id, $mediaIds)
    {
        $parameters = [
            'query' => ['mediaIds' => $mediaIds],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/deployment/' . $id . '/media', $parameters);

        return $result;
    }
}
