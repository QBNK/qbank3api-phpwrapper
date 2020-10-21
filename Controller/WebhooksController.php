<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\Webhook;
use QBNK\QBank\API\Model\WebhookResponse;

class WebhooksController extends ControllerAbstract
{
    /**
     * Lists all webhooks.
     *
     * @param int         $offset         page offset
     * @param int         $limit          page limit (Max 100)
     * @param bool        $includeDeleted include deleted webhooks
     * @param CachePolicy $cachePolicy    a custom cache policy used for this request only
     *
     * @return WebhookResponse[]
     */
    public function listWebhooks($offset = 0, $limit = 100, $includeDeleted = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['offset' => $offset, 'limit' => $limit, 'includeDeleted' => $includeDeleted],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/webhooks', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new WebhookResponse($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Add a Webhook.
     *
     * @param Webhook $webhook A JSON encoded Webhook to be created
     *
     * @return WebhookResponse
     */
    public function createWebhook(Webhook $webhook)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['webhook' => $webhook], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/webhooks', $parameters);
        $result = new WebhookResponse($result);

        return $result;
    }

    /**
     * Update a Webhook.
     *
     * @param int     $id      the webhook identifier
     * @param Webhook $webhook A JSON encoded Webhook representing the updates
     *
     * @return WebhookResponse
     */
    public function updateWebhook($id, Webhook $webhook)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['webhook' => $webhook], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/webhooks/' . $id . '', $parameters);
        $result = new WebhookResponse($result);

        return $result;
    }

    /**
     * Delete a Webhook.
     *
     * @param int $id the Webhook ID to delete
     *
     * @return WebhookResponse
     */
    public function removeWebhook($id)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/webhooks/' . $id . '', $parameters);
        $result = new WebhookResponse($result);

        return $result;
    }
}
