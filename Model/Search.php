<?php

namespace QBNK\QBank\API\Model;

class Search implements \JsonSerializable
{
    /** @var int Starting offset of the search */
    protected $offset;
    /** @var int The number of results to return */
    protected $limit;
    /** @var string A freetext string to search for, operators like and/or/not and grouping by parentheses is available */
    protected $freeText;
    /** @var int[] An array with ObjectIds to filter by */
    protected $objectIds;
    /** @var int[] An array with MediaIds to filter by */
    protected $mediaIds;
    /** @var int[] Filter by creators of Media */
    protected $createdByIds;
    /** @var DateTimeRange Filter by created date ({"min":"dateTimeString", "max":"dateTimeString"}) */
    protected $createdRange;
    /** @var int[] Filter by updaters of Media */
    protected $updatedByIds;
    /** @var DateTimeRange Filter by updated date ({"min":"dateTimeString", "max":"dateTimeString"}) */
    protected $updatedRange;
    /** @var int[] Filter by updaters of Media */
    protected $uploadedByIds;
    /** @var DateTimeRange Filter by uploaded date ({"min":"dateTimeString", "max":"dateTimeString"}) */
    protected $uploadedRange;
    /** @var int[] An array with MediaStatuses to filter by */
    protected $mediaStatusIds;
    /** @var int[] An array with FolderIds to search within */
    protected $folderIds;
    /** @var int The depth of folders to fetch objects from when doing folder searches */
    protected $folderDepth;
    /** @var int[] An array with MoodboardIds to search within */
    protected $moodboardIds;
    /** @var int[] An array with CategoryIds to search within */
    protected $categoryIds;
    /** @var bool Indicates that we should ignore grouping and return child objects in the result */
    protected $ignoreGrouping;
    /** @var bool Indicates that we should include grouped objects in each object */
    protected $includeChildren;
    /** @var int Search for media that have this media as parent */
    protected $parentId;
    /** @var int[] An array with DeploymentSiteIds to search within */
    protected $deploymentSiteIds;
    /** @var PropertyCriteria[] An array of Properties to filter by */
    protected $properties;
    /** @var string[] Filter by file size. An array with "min" and/or "max" values. */
    protected $fileSizeCriteria;
    /** @var string[] Filter by file width. An array with "min" and/or "max" values. */
    protected $widthCriteria;
    /** @var string[] Filter by file duration in seconds. An array with "min" and/or "max" values. */
    protected $durationCriteria;
    /** @var string[] Filter by file height. An array with "min" and/or "max" values. */
    protected $heightCriteria;
    /** @var string[] Filter by mime type. An array of normal LIKE database syntax, for example image/% will return all images, video/% all videos. */
    protected $mimeTypes;
    /** @var string Filter by file name, uses normal LIKE database syntax */
    protected $fileName;
    /** @var string Filter by object name, uses normal LIKE database syntax */
    protected $name;
    /** @var DateTimeRange Filter by deployment date */
    protected $deploymentDateRange;
    /** @var SearchSort[] An array of SearchSort fields to order results by */
    protected $sortFields;
    /** @var bool Search only for duplicates */
    protected $duplicates;

    /**
     * Constructs a Search.
     *
     * @param array $parameters An array of parameters to initialize the {@link Search} with.
     *                          - <b>offset</b> - Starting offset of the search
     *                          - <b>limit</b> - The number of results to return
     *                          - <b>freeText</b> - A freetext string to search for, operators like and/or/not and grouping by parentheses is available
     *                          - <b>objectIds</b> - An array with ObjectIds to filter by
     *                          - <b>mediaIds</b> - An array with MediaIds to filter by
     *                          - <b>createdByIds</b> - Filter by creators of Media
     *                          - <b>createdRange</b> - Filter by created date ({"min":"dateTimeString", "max":"dateTimeString"})
     *                          - <b>updatedByIds</b> - Filter by updaters of Media
     *                          - <b>updatedRange</b> - Filter by updated date ({"min":"dateTimeString", "max":"dateTimeString"})
     *                          - <b>uploadedByIds</b> - Filter by updaters of Media
     *                          - <b>uploadedRange</b> - Filter by uploaded date ({"min":"dateTimeString", "max":"dateTimeString"})
     *                          - <b>mediaStatusIds</b> - An array with MediaStatuses to filter by
     *                          - <b>folderIds</b> - An array with FolderIds to search within
     *                          - <b>folderDepth</b> - The depth of folders to fetch objects from when doing folder searches
     *                          - <b>moodboardIds</b> - An array with MoodboardIds to search within
     *                          - <b>categoryIds</b> - An array with CategoryIds to search within
     *                          - <b>ignoreGrouping</b> - Indicates that we should ignore grouping and return child objects in the result
     *                          - <b>includeChildren</b> - Indicates that we should include grouped objects in each object
     *                          - <b>parentId</b> - Search for media that have this media as parent
     *                          - <b>deploymentSiteIds</b> - An array with DeploymentSiteIds to search within
     *                          - <b>properties</b> - An array of Properties to filter by
     *                          - <b>fileSizeCriteria</b> - Filter by file size. An array with "min" and/or "max" values.
     *                          - <b>widthCriteria</b> - Filter by file width. An array with "min" and/or "max" values.
     *                          - <b>durationCriteria</b> - Filter by file duration in seconds. An array with "min" and/or "max" values.
     *                          - <b>heightCriteria</b> - Filter by file height. An array with "min" and/or "max" values.
     *                          - <b>mimeTypes</b> - Filter by mime type. An array of normal LIKE database syntax, for example image/% will return all images, video/% all videos.
     *                          - <b>fileName</b> - Filter by file name, uses normal LIKE database syntax
     *                          - <b>name</b> - Filter by object name, uses normal LIKE database syntax
     *                          - <b>deploymentDateRange</b> - Filter by deployment date
     *                          - <b>sortFields</b> - An array of SearchSort fields to order results by
     *                          - <b>duplicates</b> - Search only for duplicates
     */
    public function __construct($parameters = [])
    {
        $this->objectIds = [];
        $this->mediaIds = [];
        $this->createdByIds = [];
        $this->updatedByIds = [];
        $this->uploadedByIds = [];
        $this->mediaStatusIds = [];
        $this->folderIds = [];
        $this->moodboardIds = [];
        $this->categoryIds = [];
        $this->deploymentSiteIds = [];
        $this->properties = [];
        $this->fileSizeCriteria = [];
        $this->widthCriteria = [];
        $this->durationCriteria = [];
        $this->heightCriteria = [];
        $this->mimeTypes = [];
        $this->sortFields = [];

        $this->offset = 0;
        $this->limit = 50;
        $this->mediaStatusIds = [4];

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
        if (isset($parameters['mediaIds'])) {
            $this->setMediaIds($parameters['mediaIds']);
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
        if (isset($parameters['uploadedByIds'])) {
            $this->setUploadedByIds($parameters['uploadedByIds']);
        }
        if (isset($parameters['uploadedRange'])) {
            $this->setUploadedRange($parameters['uploadedRange']);
        }
        if (isset($parameters['mediaStatusIds'])) {
            $this->setMediaStatusIds($parameters['mediaStatusIds']);
        }
        if (isset($parameters['folderIds'])) {
            $this->setFolderIds($parameters['folderIds']);
        }
        if (isset($parameters['folderDepth'])) {
            $this->setFolderDepth($parameters['folderDepth']);
        }
        if (isset($parameters['moodboardIds'])) {
            $this->setMoodboardIds($parameters['moodboardIds']);
        }
        if (isset($parameters['categoryIds'])) {
            $this->setCategoryIds($parameters['categoryIds']);
        }
        if (isset($parameters['ignoreGrouping'])) {
            $this->setIgnoreGrouping($parameters['ignoreGrouping']);
        }
        if (isset($parameters['includeChildren'])) {
            $this->setIncludeChildren($parameters['includeChildren']);
        }
        if (isset($parameters['parentId'])) {
            $this->setParentId($parameters['parentId']);
        }
        if (isset($parameters['deploymentSiteIds'])) {
            $this->setDeploymentSiteIds($parameters['deploymentSiteIds']);
        }
        if (isset($parameters['properties'])) {
            $this->setProperties($parameters['properties']);
        }
        if (isset($parameters['fileSizeCriteria'])) {
            $this->setFileSizeCriteria($parameters['fileSizeCriteria']);
        }
        if (isset($parameters['widthCriteria'])) {
            $this->setWidthCriteria($parameters['widthCriteria']);
        }
        if (isset($parameters['durationCriteria'])) {
            $this->setDurationCriteria($parameters['durationCriteria']);
        }
        if (isset($parameters['heightCriteria'])) {
            $this->setHeightCriteria($parameters['heightCriteria']);
        }
        if (isset($parameters['mimeTypes'])) {
            $this->setMimeTypes($parameters['mimeTypes']);
        }
        if (isset($parameters['fileName'])) {
            $this->setFileName($parameters['fileName']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['deploymentDateRange'])) {
            $this->setDeploymentDateRange($parameters['deploymentDateRange']);
        }
        if (isset($parameters['sortFields'])) {
            $this->setSortFields($parameters['sortFields']);
        }
        if (isset($parameters['duplicates'])) {
            $this->setDuplicates($parameters['duplicates']);
        }
    }

    /**
     * Gets the offset of the Search.
     * @return int	 */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Sets the "offset" of the Search.
     *
     * @param int $offset
     *
     * @return Search
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Gets the limit of the Search.
     * @return int	 */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets the "limit" of the Search.
     *
     * @param int $limit
     *
     * @return Search
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Gets the freeText of the Search.
     * @return string	 */
    public function getFreeText()
    {
        return $this->freeText;
    }

    /**
     * Sets the "freeText" of the Search.
     *
     * @param string $freeText
     *
     * @return Search
     */
    public function setFreeText($freeText)
    {
        $this->freeText = $freeText;

        return $this;
    }

    /**
     * Gets the objectIds of the Search.
     * @return int[]	 */
    public function getObjectIds()
    {
        return $this->objectIds;
    }

    /**
     * Sets the "objectIds" of the Search.
     *
     * @param int[] $objectIds
     *
     * @return Search
     */
    public function setObjectIds(array $objectIds)
    {
        $this->objectIds = $objectIds;

        return $this;
    }

    /**
     * Gets the mediaIds of the Search.
     * @return int[]	 */
    public function getMediaIds()
    {
        return $this->mediaIds;
    }

    /**
     * Sets the "mediaIds" of the Search.
     *
     * @param int[] $mediaIds
     *
     * @return Search
     */
    public function setMediaIds(array $mediaIds)
    {
        $this->mediaIds = $mediaIds;

        return $this;
    }

    /**
     * Gets the createdByIds of the Search.
     * @return int[]	 */
    public function getCreatedByIds()
    {
        return $this->createdByIds;
    }

    /**
     * Sets the "createdByIds" of the Search.
     *
     * @param int[] $createdByIds
     *
     * @return Search
     */
    public function setCreatedByIds(array $createdByIds)
    {
        $this->createdByIds = $createdByIds;

        return $this;
    }

    /**
     * Gets the createdRange of the Search.
     * @return DateTimeRange	 */
    public function getCreatedRange()
    {
        return $this->createdRange;
    }

    /**
     * Sets the "createdRange" of the Search.
     *
     * @param DateTimeRange $createdRange
     *
     * @return Search
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
     * Gets the updatedByIds of the Search.
     * @return int[]	 */
    public function getUpdatedByIds()
    {
        return $this->updatedByIds;
    }

    /**
     * Sets the "updatedByIds" of the Search.
     *
     * @param int[] $updatedByIds
     *
     * @return Search
     */
    public function setUpdatedByIds(array $updatedByIds)
    {
        $this->updatedByIds = $updatedByIds;

        return $this;
    }

    /**
     * Gets the updatedRange of the Search.
     * @return DateTimeRange	 */
    public function getUpdatedRange()
    {
        return $this->updatedRange;
    }

    /**
     * Sets the "updatedRange" of the Search.
     *
     * @param DateTimeRange $updatedRange
     *
     * @return Search
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
     * Gets the uploadedByIds of the Search.
     * @return int[]	 */
    public function getUploadedByIds()
    {
        return $this->uploadedByIds;
    }

    /**
     * Sets the "uploadedByIds" of the Search.
     *
     * @param int[] $uploadedByIds
     *
     * @return Search
     */
    public function setUploadedByIds(array $uploadedByIds)
    {
        $this->uploadedByIds = $uploadedByIds;

        return $this;
    }

    /**
     * Gets the uploadedRange of the Search.
     * @return DateTimeRange	 */
    public function getUploadedRange()
    {
        return $this->uploadedRange;
    }

    /**
     * Sets the "uploadedRange" of the Search.
     *
     * @param DateTimeRange $uploadedRange
     *
     * @return Search
     */
    public function setUploadedRange($uploadedRange)
    {
        if ($uploadedRange instanceof DateTimeRange) {
            $this->uploadedRange = $uploadedRange;
        } elseif (is_array($uploadedRange)) {
            $this->uploadedRange = new DateTimeRange($uploadedRange);
        } else {
            $this->uploadedRange = null;
            trigger_error('Argument must be an object of class DateTimeRange. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the mediaStatusIds of the Search.
     * @return int[]	 */
    public function getMediaStatusIds()
    {
        return $this->mediaStatusIds;
    }

    /**
     * Sets the "mediaStatusIds" of the Search.
     *
     * @param int[] $mediaStatusIds
     *
     * @return Search
     */
    public function setMediaStatusIds(array $mediaStatusIds)
    {
        $this->mediaStatusIds = $mediaStatusIds;

        return $this;
    }

    /**
     * Gets the folderIds of the Search.
     * @return int[]	 */
    public function getFolderIds()
    {
        return $this->folderIds;
    }

    /**
     * Sets the "folderIds" of the Search.
     *
     * @param int[] $folderIds
     *
     * @return Search
     */
    public function setFolderIds(array $folderIds)
    {
        $this->folderIds = $folderIds;

        return $this;
    }

    /**
     * Gets the folderDepth of the Search.
     * @return int	 */
    public function getFolderDepth()
    {
        return $this->folderDepth;
    }

    /**
     * Sets the "folderDepth" of the Search.
     *
     * @param int $folderDepth
     *
     * @return Search
     */
    public function setFolderDepth($folderDepth)
    {
        $this->folderDepth = $folderDepth;

        return $this;
    }

    /**
     * Gets the moodboardIds of the Search.
     * @return int[]	 */
    public function getMoodboardIds()
    {
        return $this->moodboardIds;
    }

    /**
     * Sets the "moodboardIds" of the Search.
     *
     * @param int[] $moodboardIds
     *
     * @return Search
     */
    public function setMoodboardIds(array $moodboardIds)
    {
        $this->moodboardIds = $moodboardIds;

        return $this;
    }

    /**
     * Gets the categoryIds of the Search.
     * @return int[]	 */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * Sets the "categoryIds" of the Search.
     *
     * @param int[] $categoryIds
     *
     * @return Search
     */
    public function setCategoryIds(array $categoryIds)
    {
        $this->categoryIds = $categoryIds;

        return $this;
    }

    /**
     * Tells whether the Search is ignoreGrouping.
     * @return bool	 */
    public function isIgnoreGrouping()
    {
        return $this->ignoreGrouping;
    }

    /**
     * Sets the "ignoreGrouping" of the Search.
     *
     * @param bool $ignoreGrouping
     *
     * @return Search
     */
    public function setIgnoreGrouping($ignoreGrouping)
    {
        $this->ignoreGrouping = $ignoreGrouping;

        return $this;
    }

    /**
     * Tells whether the Search is includeChildren.
     * @return bool	 */
    public function isIncludeChildren()
    {
        return $this->includeChildren;
    }

    /**
     * Sets the "includeChildren" of the Search.
     *
     * @param bool $includeChildren
     *
     * @return Search
     */
    public function setIncludeChildren($includeChildren)
    {
        $this->includeChildren = $includeChildren;

        return $this;
    }

    /**
     * Gets the parentId of the Search.
     * @return int	 */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Sets the "parentId" of the Search.
     *
     * @param int $parentId
     *
     * @return Search
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Gets the deploymentSiteIds of the Search.
     * @return int[]	 */
    public function getDeploymentSiteIds()
    {
        return $this->deploymentSiteIds;
    }

    /**
     * Sets the "deploymentSiteIds" of the Search.
     *
     * @param int[] $deploymentSiteIds
     *
     * @return Search
     */
    public function setDeploymentSiteIds(array $deploymentSiteIds)
    {
        $this->deploymentSiteIds = $deploymentSiteIds;

        return $this;
    }

    /**
     * Gets the properties of the Search.
     * @return PropertyCriteria[]	 */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets the "properties" of the Search.
     *
     * @param PropertyCriteria[] $properties
     *
     * @return Search
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
     * Adds an object of "Properties" of the Search.
     *
     * @param PropertyCriteria|array $item
     *
     * @return Search
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
     * Gets the fileSizeCriteria of the Search.
     * @return string[]	 */
    public function getFileSizeCriteria()
    {
        return $this->fileSizeCriteria;
    }

    /**
     * Sets the "fileSizeCriteria" of the Search.
     *
     * @param string[] $fileSizeCriteria
     *
     * @return Search
     */
    public function setFileSizeCriteria(array $fileSizeCriteria)
    {
        $this->fileSizeCriteria = $fileSizeCriteria;

        return $this;
    }

    /**
     * Gets the widthCriteria of the Search.
     * @return string[]	 */
    public function getWidthCriteria()
    {
        return $this->widthCriteria;
    }

    /**
     * Sets the "widthCriteria" of the Search.
     *
     * @param string[] $widthCriteria
     *
     * @return Search
     */
    public function setWidthCriteria(array $widthCriteria)
    {
        $this->widthCriteria = $widthCriteria;

        return $this;
    }

    /**
     * Gets the durationCriteria of the Search.
     * @return string[]	 */
    public function getDurationCriteria()
    {
        return $this->durationCriteria;
    }

    /**
     * Sets the "durationCriteria" of the Search.
     *
     * @param string[] $durationCriteria
     *
     * @return Search
     */
    public function setDurationCriteria(array $durationCriteria)
    {
        $this->durationCriteria = $durationCriteria;

        return $this;
    }

    /**
     * Gets the heightCriteria of the Search.
     * @return string[]	 */
    public function getHeightCriteria()
    {
        return $this->heightCriteria;
    }

    /**
     * Sets the "heightCriteria" of the Search.
     *
     * @param string[] $heightCriteria
     *
     * @return Search
     */
    public function setHeightCriteria(array $heightCriteria)
    {
        $this->heightCriteria = $heightCriteria;

        return $this;
    }

    /**
     * Gets the mimeTypes of the Search.
     * @return string[]	 */
    public function getMimeTypes()
    {
        return $this->mimeTypes;
    }

    /**
     * Sets the "mimeTypes" of the Search.
     *
     * @param string[] $mimeTypes
     *
     * @return Search
     */
    public function setMimeTypes(array $mimeTypes)
    {
        $this->mimeTypes = $mimeTypes;

        return $this;
    }

    /**
     * Gets the fileName of the Search.
     * @return string	 */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Sets the "fileName" of the Search.
     *
     * @param string $fileName
     *
     * @return Search
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Gets the name of the Search.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Search.
     *
     * @param string $name
     *
     * @return Search
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the deploymentDateRange of the Search.
     * @return DateTimeRange	 */
    public function getDeploymentDateRange()
    {
        return $this->deploymentDateRange;
    }

    /**
     * Sets the "deploymentDateRange" of the Search.
     *
     * @param DateTimeRange $deploymentDateRange
     *
     * @return Search
     */
    public function setDeploymentDateRange($deploymentDateRange)
    {
        if ($deploymentDateRange instanceof DateTimeRange) {
            $this->deploymentDateRange = $deploymentDateRange;
        } elseif (is_array($deploymentDateRange)) {
            $this->deploymentDateRange = new DateTimeRange($deploymentDateRange);
        } else {
            $this->deploymentDateRange = null;
            trigger_error('Argument must be an object of class DateTimeRange. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the sortFields of the Search.
     * @return SearchSort[]	 */
    public function getSortFields()
    {
        return $this->sortFields;
    }

    /**
     * Sets the "sortFields" of the Search.
     *
     * @param SearchSort[] $sortFields
     *
     * @return Search
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
     * Adds an object of "SortFields" of the Search.
     *
     * @param SearchSort|array $item
     *
     * @return Search
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
     * Tells whether the Search is duplicates.
     * @return bool	 */
    public function isDuplicates()
    {
        return $this->duplicates;
    }

    /**
     * Sets the "duplicates" of the Search.
     *
     * @param bool $duplicates
     *
     * @return Search
     */
    public function setDuplicates($duplicates)
    {
        $this->duplicates = $duplicates;

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
        if (null !== $this->mediaIds && !empty($this->mediaIds)) {
            $json['mediaIds'] = $this->mediaIds;
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
        if (null !== $this->uploadedByIds && !empty($this->uploadedByIds)) {
            $json['uploadedByIds'] = $this->uploadedByIds;
        }
        if (null !== $this->uploadedRange) {
            $json['uploadedRange'] = $this->uploadedRange;
        }
        if (null !== $this->mediaStatusIds && !empty($this->mediaStatusIds)) {
            $json['mediaStatusIds'] = $this->mediaStatusIds;
        }
        if (null !== $this->folderIds && !empty($this->folderIds)) {
            $json['folderIds'] = $this->folderIds;
        }
        if (null !== $this->folderDepth) {
            $json['folderDepth'] = $this->folderDepth;
        }
        if (null !== $this->moodboardIds && !empty($this->moodboardIds)) {
            $json['moodboardIds'] = $this->moodboardIds;
        }
        if (null !== $this->categoryIds && !empty($this->categoryIds)) {
            $json['categoryIds'] = $this->categoryIds;
        }
        if (null !== $this->ignoreGrouping) {
            $json['ignoreGrouping'] = $this->ignoreGrouping;
        }
        if (null !== $this->includeChildren) {
            $json['includeChildren'] = $this->includeChildren;
        }
        if (null !== $this->parentId) {
            $json['parentId'] = $this->parentId;
        }
        if (null !== $this->deploymentSiteIds && !empty($this->deploymentSiteIds)) {
            $json['deploymentSiteIds'] = $this->deploymentSiteIds;
        }
        if (null !== $this->properties && !empty($this->properties)) {
            $json['properties'] = $this->properties;
        }
        if (null !== $this->fileSizeCriteria && !empty($this->fileSizeCriteria)) {
            $json['fileSizeCriteria'] = $this->fileSizeCriteria;
        }
        if (null !== $this->widthCriteria && !empty($this->widthCriteria)) {
            $json['widthCriteria'] = $this->widthCriteria;
        }
        if (null !== $this->durationCriteria && !empty($this->durationCriteria)) {
            $json['durationCriteria'] = $this->durationCriteria;
        }
        if (null !== $this->heightCriteria && !empty($this->heightCriteria)) {
            $json['heightCriteria'] = $this->heightCriteria;
        }
        if (null !== $this->mimeTypes && !empty($this->mimeTypes)) {
            $json['mimeTypes'] = $this->mimeTypes;
        }
        if (null !== $this->fileName) {
            $json['fileName'] = $this->fileName;
        }
        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->deploymentDateRange) {
            $json['deploymentDateRange'] = $this->deploymentDateRange;
        }
        if (null !== $this->sortFields && !empty($this->sortFields)) {
            $json['sortFields'] = $this->sortFields;
        }
        if (null !== $this->duplicates) {
            $json['duplicates'] = $this->duplicates;
        }

        return $json;
    }
}
