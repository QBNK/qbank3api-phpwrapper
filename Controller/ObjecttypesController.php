<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\ObjectType;

class ObjecttypesController extends ControllerAbstract
{
    /**
     * Lists all Object Types.
     *
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return ObjectType[]
     */
    public function listObjectTypes(CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/objecttypes', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new ObjectType($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific ObjectType.
     *
     * Fetches an ObjectType by the specified identifier.
     *
     * @param int         $id          the ObjectType identifier
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return ObjectType
     */
    public function retrieveObjectType($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/objecttypes/' . $id . '', $parameters, $cachePolicy);
        $result = new ObjectType($result);

        return $result;
    }
}
