<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\FolderSearch;
use QBNK\QBank\API\Model\Search;
use QBNK\QBank\API\Model\SearchResult;

class SearchController extends ControllerAbstract
{
    const RETURN_OBJECTS = 1;
    const RETURN_IDS = 2;

    /**
     * routes to <mark>QBNK\QBank\Api\v1\Search::metadata();</mark>.
     *
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     */
    public function metadata(CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/search/metadata', $parameters, $cachePolicy);

        return $result;
    }

    /**
     * Search for Media.
     *
     * in QBank
     *
     * @param Search $search     Search parameters
     * @param int    $returnType whether to return object, mediaIds
     *
     * @return SearchResult
     */
    public function search(Search $search, $returnType = self::RETURN_OBJECTS, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['returnType' => $returnType],
            'body' => json_encode(['search' => $search], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->call('v1/search', $parameters, self::METHOD_POST, $cachePolicy);
        $result = new SearchResult($result);

        return $result;
    }

    /**
     * Search for Folder.
     *
     * s in QBank
     *
     * @param FolderSearch $search Search parameters
     *
     * @return SearchResult
     */
    public function folderSearch(FolderSearch $search)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['search' => $search], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/search/folder', $parameters);
        $result = new SearchResult($result);

        return $result;
    }

    /**
     * Get total hit count for media search.
     *
     * in QBank
     *
     * @param Search $search Search parameters
     */
    public function searchtotal(Search $search)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['search' => $search], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/search/total', $parameters);

        return $result;
    }
}
