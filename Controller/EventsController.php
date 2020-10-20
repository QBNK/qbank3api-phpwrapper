<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\Model\DownloadItem;
use QBNK\QBank\API\Model\MediaUsage;
use QBNK\QBank\API\Model\MediaUsageResponse;
use QBNK\QBank\API\Model\Search;

class EventsController extends ControllerAbstract
{
    /**
     * Track a Media custom event.
     *
     * NOTICE!
     * Execution of this call will be delayed until destruct!
     *
     * @param int    $sessionId The session id to log the event on
     * @param int    $mediaId   The ID of the media in the event
     * @param string $event     The event
     */
    public function custom($sessionId, $mediaId, $event)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['sessionId' => $sessionId, 'mediaId' => $mediaId, 'event' => $event], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/events/custom', $parameters, true);

        return $result;
    }

    /**
     * Track a Media download.
     *
     * NOTICE!
     * Execution of this call will be delayed until destruct!
     *
     * @param int            $sessionId The session id to log the download on
     * @param DownloadItem[] $downloads An array of DownloadItem (media & template) that was downloaded
     */
    public function download($sessionId, array $downloads)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['sessionId' => $sessionId, 'downloads' => $downloads], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/events/download', $parameters, true);

        return $result;
    }

    /**
     * Track a Search.
     *
     * NOTICE!
     * Execution of this call will be delayed until destruct!
     *
     * @param int    $sessionId The session id to log the search on
     * @param Search $search    The Search that was made
     * @param int    $hits      Number of hits for this search
     */
    public function search($sessionId, Search $search, $hits)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['sessionId' => $sessionId, 'search' => $search, 'hits' => $hits], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/events/search', $parameters, true);

        return $result;
    }

    /**
     * Creates a sessionId.
     *
     * SessionId must be sent along with all subsequent requests to track events.
     *
     * @param int    $sourceId    the source we should log things on
     * @param string $sessionHash Some sort of identifier for the user
     * @param string $remoteIp    Ip-address of the user
     * @param string $userAgent   the User Agent of the user
     * @param int    $userId      Optional override value for the user id
     */
    public function session($sourceId, $sessionHash, $remoteIp, $userAgent, $userId = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['sourceId' => $sourceId, 'sessionHash' => $sessionHash, 'remoteIp' => $remoteIp, 'userAgent' => $userAgent, 'userId' => $userId], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/events/session', $parameters);

        return $result;
    }

    /**
     * Register a usage of a Media.
     *
     * @param int        $sessionId  The session id to log the event on
     * @param MediaUsage $mediaUsage The MediaUsage to register
     *
     * @return MediaUsageResponse
     */
    public function addUsage($sessionId, MediaUsage $mediaUsage)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['sessionId' => $sessionId, 'mediaUsage' => $mediaUsage], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/events/usage', $parameters);
        $result = new MediaUsageResponse($result);

        return $result;
    }

    /**
     * Track a Media view.
     *
     * NOTICE!
     * Execution of this call will be delayed until destruct!
     *
     * @param int $sessionId The session id to log the view on
     * @param int $mediaId   The ID of the media that was viewed
     */
    public function view($sessionId, $mediaId)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['sessionId' => $sessionId, 'mediaId' => $mediaId], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/events/view', $parameters, true);

        return $result;
    }

    /**
     * Unregister (remove) a Media usage.
     *
     * @param int $id the ID of the usage to remove
     *
     * @return MediaUsageResponse
     */
    public function removeUsage($id)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/events/usage/' . $id . '', $parameters);
        $result = new MediaUsageResponse($result);

        return $result;
    }
}
