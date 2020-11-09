<?php

namespace QBNK\QBank\API\Model;

class SearchSort implements \JsonSerializable
{
    const FIELD_ID = 'id';
    const FIELD_NAME = 'name';
	const FIELD_FILENAME = 'filename';
    const FIELD_CREATED = 'created';
    const FIELD_UPDATED = 'updated';
    const FIELD_RELEVANCE = 'relevance';
    const FIELD_CATEGORY = 'category';
    const FIELD_SIZE = 'size';
    const FIELD_MIMETYPE = 'mimetype';
    const FIELD_POPULARITY = 'popularity';
    const FIELD_PROPERTY = 'property';
    const FIELD_DEPLOYMENTDATE = 'deploymentdate';

    const DIRECTION_ASCENDING = 'asc';
    const DIRECTION_DESCENDING = 'desc';

    /** @var string Field to sort by */
    protected $sortField;
    /** @var string Sort Direction */
    protected $sortDirection;
    /** @var int When sorting on Media Popularity, the source to check (QBank Backend, frontend, etc) */
    protected $sourceId;
    /** @var DateTimeRange When sorting on Media Popularity, a optional dateRange to find popular media within */
    protected $dateRange;
    /** @var string When sorting on a property, the system name of the property to sort on */
    protected $systemName;
    /** @var string When sorting on a Json Property, the Json key to sort by */
    protected $jsonKey;
    /** @var int When sorting on deploymentdate, the optional site id to sort by */
    protected $deploymentSiteId;

    /**
     * Constructs a SearchSort.
     *
     * @param array $parameters An array of parameters to initialize the {@link SearchSort} with.
     *                          - <b>sortField</b> - Field to sort by
     *                          - <b>sortDirection</b> - Sort Direction
     *                          - <b>sourceId</b> - When sorting on Media Popularity, the source to check (QBank Backend, frontend, etc)
     *                          - <b>dateRange</b> - When sorting on Media Popularity, a optional dateRange to find popular media within
     *                          - <b>systemName</b> - When sorting on a property, the system name of the property to sort on
     *                          - <b>jsonKey</b> - When sorting on a Json Property, the Json key to sort by
     *                          - <b>deploymentSiteId</b> - When sorting on deploymentdate, the optional site id to sort by
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['sortField'])) {
            $this->setSortField($parameters['sortField']);
        }
        if (isset($parameters['sortDirection'])) {
            $this->setSortDirection($parameters['sortDirection']);
        }
        if (isset($parameters['sourceId'])) {
            $this->setSourceId($parameters['sourceId']);
        }
        if (isset($parameters['dateRange'])) {
            $this->setDateRange($parameters['dateRange']);
        }
        if (isset($parameters['systemName'])) {
            $this->setSystemName($parameters['systemName']);
        }
        if (isset($parameters['jsonKey'])) {
            $this->setJsonKey($parameters['jsonKey']);
        }
        if (isset($parameters['deploymentSiteId'])) {
            $this->setDeploymentSiteId($parameters['deploymentSiteId']);
        }
    }

    /**
     * Gets the sortField of the SearchSort.
     * @return string	 */
    public function getSortField()
    {
        return $this->sortField;
    }

    /**
     * Sets the "sortField" of the SearchSort.
     *
     * @param string $sortField
     *
     * @return SearchSort
     */
    public function setSortField($sortField)
    {
        $this->sortField = $sortField;

        return $this;
    }

    /**
     * Gets the sortDirection of the SearchSort.
     * @return string	 */
    public function getSortDirection()
    {
        return $this->sortDirection;
    }

    /**
     * Sets the "sortDirection" of the SearchSort.
     *
     * @param string $sortDirection
     *
     * @return SearchSort
     */
    public function setSortDirection($sortDirection)
    {
        $this->sortDirection = $sortDirection;

        return $this;
    }

    /**
     * Gets the sourceId of the SearchSort.
     * @return int	 */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Sets the "sourceId" of the SearchSort.
     *
     * @param int $sourceId
     *
     * @return SearchSort
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    /**
     * Gets the dateRange of the SearchSort.
     * @return DateTimeRange	 */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * Sets the "dateRange" of the SearchSort.
     *
     * @param DateTimeRange $dateRange
     *
     * @return SearchSort
     */
    public function setDateRange($dateRange)
    {
        if ($dateRange instanceof DateTimeRange) {
            $this->dateRange = $dateRange;
        } elseif (is_array($dateRange)) {
            $this->dateRange = new DateTimeRange($dateRange);
        } else {
            $this->dateRange = null;
            trigger_error('Argument must be an object of class DateTimeRange. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the systemName of the SearchSort.
     * @return string	 */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * Sets the "systemName" of the SearchSort.
     *
     * @param string $systemName
     *
     * @return SearchSort
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;

        return $this;
    }

    /**
     * Gets the jsonKey of the SearchSort.
     * @return string	 */
    public function getJsonKey()
    {
        return $this->jsonKey;
    }

    /**
     * Sets the "jsonKey" of the SearchSort.
     *
     * @param string $jsonKey
     *
     * @return SearchSort
     */
    public function setJsonKey($jsonKey)
    {
        $this->jsonKey = $jsonKey;

        return $this;
    }

    /**
     * Gets the deploymentSiteId of the SearchSort.
     * @return int	 */
    public function getDeploymentSiteId()
    {
        return $this->deploymentSiteId;
    }

    /**
     * Sets the "deploymentSiteId" of the SearchSort.
     *
     * @param int $deploymentSiteId
     *
     * @return SearchSort
     */
    public function setDeploymentSiteId($deploymentSiteId)
    {
        $this->deploymentSiteId = $deploymentSiteId;

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

        if (null !== $this->sortField) {
            $json['sortField'] = $this->sortField;
        }
        if (null !== $this->sortDirection) {
            $json['sortDirection'] = $this->sortDirection;
        }
        if (null !== $this->sourceId) {
            $json['sourceId'] = $this->sourceId;
        }
        if (null !== $this->dateRange) {
            $json['dateRange'] = $this->dateRange;
        }
        if (null !== $this->systemName) {
            $json['systemName'] = $this->systemName;
        }
        if (null !== $this->jsonKey) {
            $json['jsonKey'] = $this->jsonKey;
        }
        if (null !== $this->deploymentSiteId) {
            $json['deploymentSiteId'] = $this->deploymentSiteId;
        }

        return $json;
    }
}
