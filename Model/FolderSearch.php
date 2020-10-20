<?php

namespace QBNK\QBank\API\Model;

class FolderSearch implements \JsonSerializable
{
    /** @var int Starting offset of the search */
    protected $offset;
    /** @var int The number of results to return */
    protected $limit;
    /** @var string A freetext string to search for, operators like and/or/not and grouping by parentheses is available */
    protected $freeText;
    /** @var int[] An array with ObjectIds to filter by */
    protected $objectIds;
    /** @var int[] Filter by creators of Media */
    protected $createdByIds;
    /** @var DateTimeRange Filter by created date */
    protected $createdRange;
    /** @var int[] Filter by updaters of Media */
    protected $updatedByIds;
    /** @var DateTimeRange Filter by updated date */
    protected $updatedRange;
    /** @var int ID of a direct parent folder */
    protected $parentId;
    /** @var PropertyCriteria[] An array of Properties to filter by */
    protected $properties;
    /** @var string Filter by object name, uses normal LIKE database syntax */
    protected $name;
    /** @var SearchSort[] An array of SearchSort fields to order results by */
    protected $sortFields;

    /**
     * Constructs a FolderSearch.
     *
     * @param array $parameters An array of parameters to initialize the {@link FolderSearch} with.
     *                          - <b>offset</b> - Starting offset of the search
     *                          - <b>limit</b> - The number of results to return
     *                          - <b>freeText</b> - A freetext string to search for, operators like and/or/not and grouping by parentheses is available
     *                          - <b>objectIds</b> - An array with ObjectIds to filter by
     *                          - <b>createdByIds</b> - Filter by creators of Media
     *                          - <b>createdRange</b> - Filter by created date
     *                          - <b>updatedByIds</b> - Filter by updaters of Media
     *                          - <b>updatedRange</b> - Filter by updated date
     *                          - <b>parentId</b> - ID of a direct parent folder
     *                          - <b>properties</b> - An array of Properties to filter by
     *                          - <b>name</b> - Filter by object name, uses normal LIKE database syntax
     *                          - <b>sortFields</b> - An array of SearchSort fields to order results by
     */
    public function __construct($parameters = [])
    {
        $this->objectIds = [];
        $this->createdByIds = [];
        $this->updatedByIds = [];
        $this->properties = [];
        $this->sortFields = [];

        if (isset($parameters['offset'])) {
            $this->setOffset($parameters['offset']);
        }
        if (isset($parameters['limit'])) {
            $this->setLimit($parameters['limit']);
        }
        if (isset($parameters['freeText'])) {
            $this->setFreeText($parameters['freeText']);
        }
        if (isset($parameters['objectIds'])) {
            $this->setObjectIds($parameters['objectIds']);
        }
        if (isset($parameters['createdByIds'])) {
            $this->setCreatedByIds($parameters['createdByIds']);
        }
        if (isset($parameters['createdRange'])) {
            $this->setCreatedRange($parameters['createdRange']);
        }
        if (isset($parameters['updatedByIds'])) {
            $this->setUpdatedByIds($parameters['updatedByIds']);
        }
        if (isset($parameters['updatedRange'])) {
            $this->setUpdatedRange($parameters['updatedRange']);
        }
        if (isset($parameters['parentId'])) {
            $this->setParentId($parameters['parentId']);
        }
        if (isset($parameters['properties'])) {
            $this->setProperties($parameters['properties']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['sortFields'])) {
            $this->setSortFields($parameters['sortFields']);
        }
    }

    /**
     * Gets the offset of the FolderSearch.
     * @return int	 */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Sets the "offset" of the FolderSearch.
     *
     * @param int $offset
     *
     * @return FolderSearch
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Gets the limit of the FolderSearch.
     * @return int	 */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets the "limit" of the FolderSearch.
     *
     * @param int $limit
     *
     * @return FolderSearch
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Gets the freeText of the FolderSearch.
     * @return string	 */
    public function getFreeText()
    {
        return $this->freeText;
    }

    /**
     * Sets the "freeText" of the FolderSearch.
     *
     * @param string $freeText
     *
     * @return FolderSearch
     */
    public function setFreeText($freeText)
    {
        $this->freeText = $freeText;

        return $this;
    }

    /**
     * Gets the objectIds of the FolderSearch.
     * @return int[]	 */
    public function getObjectIds()
    {
        return $this->objectIds;
    }

    /**
     * Sets the "objectIds" of the FolderSearch.
     *
     * @param int[] $objectIds
     *
     * @return FolderSearch
     */
    public function setObjectIds(array $objectIds)
    {
        $this->objectIds = $objectIds;

        return $this;
    }

    /**
     * Gets the createdByIds of the FolderSearch.
     * @return int[]	 */
    public function getCreatedByIds()
    {
        return $this->createdByIds;
    }

    /**
     * Sets the "createdByIds" of the FolderSearch.
     *
     * @param int[] $createdByIds
     *
     * @return FolderSearch
     */
    public function setCreatedByIds(array $createdByIds)
    {
        $this->createdByIds = $createdByIds;

        return $this;
    }

    /**
     * Gets the createdRange of the FolderSearch.
     * @return DateTimeRange	 */
    public function getCreatedRange()
    {
        return $this->createdRange;
    }

    /**
     * Sets the "createdRange" of the FolderSearch.
     *
     * @param DateTimeRange $createdRange
     *
     * @return FolderSearch
     */
    public function setCreatedRange($createdRange)
    {
        if ($createdRange instanceof DateTimeRange) {
            $this->createdRange = $createdRange;
        } elseif (is_array($createdRange)) {
            $this->createdRange = new DateTimeRange($createdRange);
        } else {
            $this->createdRange = null;
            trigger_error('Argument must be an object of class DateTimeRange. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the updatedByIds of the FolderSearch.
     * @return int[]	 */
    public function getUpdatedByIds()
    {
        return $this->updatedByIds;
    }

    /**
     * Sets the "updatedByIds" of the FolderSearch.
     *
     * @param int[] $updatedByIds
     *
     * @return FolderSearch
     */
    public function setUpdatedByIds(array $updatedByIds)
    {
        $this->updatedByIds = $updatedByIds;

        return $this;
    }

    /**
     * Gets the updatedRange of the FolderSearch.
     * @return DateTimeRange	 */
    public function getUpdatedRange()
    {
        return $this->updatedRange;
    }

    /**
     * Sets the "updatedRange" of the FolderSearch.
     *
     * @param DateTimeRange $updatedRange
     *
     * @return FolderSearch
     */
    public function setUpdatedRange($updatedRange)
    {
        if ($updatedRange instanceof DateTimeRange) {
            $this->updatedRange = $updatedRange;
        } elseif (is_array($updatedRange)) {
            $this->updatedRange = new DateTimeRange($updatedRange);
        } else {
            $this->updatedRange = null;
            trigger_error('Argument must be an object of class DateTimeRange. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the parentId of the FolderSearch.
     * @return int	 */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Sets the "parentId" of the FolderSearch.
     *
     * @param int $parentId
     *
     * @return FolderSearch
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Gets the properties of the FolderSearch.
     * @return PropertyCriteria[]	 */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets the "properties" of the FolderSearch.
     *
     * @param PropertyCriteria[] $properties
     *
     * @return FolderSearch
     */
    public function setProperties(array $properties)
    {
        $this->properties = [];

        foreach ($properties as $item) {
            $this->addPropertyCriteria($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Properties" of the FolderSearch.
     *
     * @param PropertyCriteria|array $item
     *
     * @return FolderSearch
     */
    public function addPropertyCriteria($item)
    {
        if (!($item instanceof PropertyCriteria)) {
            if (is_array($item)) {
                try {
                    $item = new PropertyCriteria($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate PropertyCriteria. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "PropertyCriteria"!', E_USER_WARNING);
            }
        }
        $this->properties[] = $item;

        return $this;
    }

    /**
     * Gets the name of the FolderSearch.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the FolderSearch.
     *
     * @param string $name
     *
     * @return FolderSearch
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the sortFields of the FolderSearch.
     * @return SearchSort[]	 */
    public function getSortFields()
    {
        return $this->sortFields;
    }

    /**
     * Sets the "sortFields" of the FolderSearch.
     *
     * @param SearchSort[] $sortFields
     *
     * @return FolderSearch
     */
    public function setSortFields(array $sortFields)
    {
        $this->sortFields = [];

        foreach ($sortFields as $item) {
            $this->addSearchSort($item);
        }

        return $this;
    }

    /**
     * Adds an object of "SortFields" of the FolderSearch.
     *
     * @param SearchSort|array $item
     *
     * @return FolderSearch
     */
    public function addSearchSort($item)
    {
        if (!($item instanceof SearchSort)) {
            if (is_array($item)) {
                try {
                    $item = new SearchSort($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate SearchSort. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "SearchSort"!', E_USER_WARNING);
            }
        }
        $this->sortFields[] = $item;

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

        if (null !== $this->offset) {
            $json['offset'] = $this->offset;
        }
        if (null !== $this->limit) {
            $json['limit'] = $this->limit;
        }
        if (null !== $this->freeText) {
            $json['freeText'] = $this->freeText;
        }
        if (null !== $this->objectIds && !empty($this->objectIds)) {
            $json['objectIds'] = $this->objectIds;
        }
        if (null !== $this->createdByIds && !empty($this->createdByIds)) {
            $json['createdByIds'] = $this->createdByIds;
        }
        if (null !== $this->createdRange) {
            $json['createdRange'] = $this->createdRange;
        }
        if (null !== $this->updatedByIds && !empty($this->updatedByIds)) {
            $json['updatedByIds'] = $this->updatedByIds;
        }
        if (null !== $this->updatedRange) {
            $json['updatedRange'] = $this->updatedRange;
        }
        if (null !== $this->parentId) {
            $json['parentId'] = $this->parentId;
        }
        if (null !== $this->properties && !empty($this->properties)) {
            $json['properties'] = $this->properties;
        }
        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->sortFields && !empty($this->sortFields)) {
            $json['sortFields'] = $this->sortFields;
        }

        return $json;
    }
}
