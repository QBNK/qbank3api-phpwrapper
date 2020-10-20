<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\FilterItem;

class FiltersController extends ControllerAbstract
{
    const FREETEXT_AND = 'AND';
    const FREETEXT_OR = 'OR';

    /**
     * Returns a array of FilterItem for the chosen categories.
     *
     * , optionally filtered by specific DeploymentSites.
     *
     * @param string      $categoryIds       comma separated string categoryIds we should fetch mediaIds for
     * @param string      $deploymentSiteIds comma separated string of deploymentSiteIds we should fetch mediaIds for
     * @param bool        $ignoreGrouping    whether to include grouped media or not
     * @param bool        $ignoreMediaIds    whether to include media ids or not
     * @param CachePolicy $cachePolicy       a custom cache policy used for this request only
     *
     * @return FilterItem[]
     */
    public function categories($categoryIds, $deploymentSiteIds = null, $ignoreGrouping = false, $ignoreMediaIds = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['deploymentSiteIds' => $deploymentSiteIds, 'ignoreGrouping' => $ignoreGrouping, 'ignoreMediaIds' => $ignoreMediaIds],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/filters/categories/' . $categoryIds . '', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new FilterItem($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Returns a array of FilterItem for the chosen folder subfolders.
     *
     * , optionally filtered by specific CategoryIds and/or DeploymentSites.
     *
     * @param int         $parentFolderId    The folder id..
     * @param string      $categoryIds       comma separated string categoryIds we should fetch mediaIds for
     * @param string      $deploymentSiteIds comma separated string of deploymentSiteIds we should fetch mediaIds for
     * @param bool        $ignoreGrouping    whether to include grouped media or not
     * @param CachePolicy $cachePolicy       a custom cache policy used for this request only
     *
     * @return FilterItem[]
     */
    public function folder($parentFolderId, $categoryIds = null, $deploymentSiteIds = null, $ignoreGrouping = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['categoryIds' => $categoryIds, 'deploymentSiteIds' => $deploymentSiteIds, 'ignoreGrouping' => $ignoreGrouping],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/filters/folder/' . $parentFolderId . '', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new FilterItem($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Returns a array of FilterItem for a specific freetext.
     *
     * , optionally filtered by DeploymentSites.
     *
     * @param string      $freetext          string to filter by
     * @param string      $deploymentSiteIds comma separated string of deploymentSiteIds we should fetch mediaIds for
     * @param string      $mode              the method (AND|OR) to filter words by
     * @param bool        $ignoreGrouping    whether to include grouped media or not
     * @param CachePolicy $cachePolicy       a custom cache policy used for this request only
     *
     * @return FilterItem[]
     */
    public function freetext($freetext, $deploymentSiteIds = null, $mode = self::FREETEXT_OR, $ignoreGrouping = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['deploymentSiteIds' => $deploymentSiteIds, 'mode' => $mode, 'ignoreGrouping' => $ignoreGrouping],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/filters/freetext/' . $freetext . '', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new FilterItem($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Returns a array of FilterItem for the chosen property.
     *
     * , optionally filtered by specific CategoryIds and/or DeploymentSites.
     *
     * @param string      $systemName        system name of property to filter by
     * @param bool        $preloadNames      if item names should be preloaded from property type
     * @param string      $categoryIds       comma separated string categoryIds we should fetch mediaIds for
     * @param string      $deploymentSiteIds comma separated string of deploymentSiteIds we should fetch mediaIds for
     * @param bool        $isHierarchical    whether or not the property is hierarchical
     * @param bool        $ignoreGrouping    whether to include grouped media or not
     * @param bool        $ignoreMediaIds    whether to ignore media ids or not
     * @param CachePolicy $cachePolicy       a custom cache policy used for this request only
     *
     * @return FilterItem[]
     */
    public function property($systemName, $preloadNames = false, $categoryIds = null, $deploymentSiteIds = null, $isHierarchical = false, $ignoreGrouping = false, $ignoreMediaIds = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['preloadNames' => $preloadNames, 'categoryIds' => $categoryIds, 'deploymentSiteIds' => $deploymentSiteIds, 'isHierarchical' => $isHierarchical, 'ignoreGrouping' => $ignoreGrouping, 'ignoreMediaIds' => $ignoreMediaIds],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/filters/property/' . $systemName . '', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new FilterItem($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
}
