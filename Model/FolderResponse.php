<?php

namespace QBNK\QBank\API\Model;

use DateTime;
use QBNK\QBank\API\Exception\PropertyNotFoundException;

class FolderResponse extends Folder implements \JsonSerializable
{
    /** @var int The Folder identifier. */
    protected $id;
    /** @var FolderResponse[] The Folder's children, ie. subfolders. */
    protected $subFolders;
    /** @var SavedSearch The saved search of the (filter-)folder. */
    protected $savedSearch;
    /** @var int The number of objects in this folder */
    protected $objectCount;
    /** @var int An optional parent Folder identifier. */
    protected $parentId;
    /** @var int The base Object identifier. */
    protected $objectId;
    /** @var DateTime When the Object was created. */
    protected $created;
    /** @var int The identifier of the User who created the Object. */
    protected $createdBy;
    /** @var DateTime When the Object was updated. */
    protected $updated;
    /** @var int Which user that updated the Object. */
    protected $updatedBy;
    /** @var bool Whether the object has been modified since constructed. */
    protected $dirty;
    /** @var PropertySet[] The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties. */
    protected $propertySets;
    /** @var int The discriminator id of the extending class */
    protected $discriminatorId;

    /**
     * Constructs a FolderResponse.
     *
     * @param array $parameters An array of parameters to initialize the {@link FolderResponse} with.
     *                          - <b>id</b> - The Folder identifier.
     *                          - <b>subFolders</b> - The Folder's children, ie. subfolders.
     *                          - <b>savedSearch</b> - The saved search of the (filter-)folder.
     *                          - <b>objectCount</b> - The number of objects in this folder
     *                          - <b>parentId</b> - An optional parent Folder identifier.
     *                          - <b>objectId</b> - The base Object identifier.
     *                          - <b>created</b> - When the Object was created.
     *                          - <b>createdBy</b> - The identifier of the User who created the Object.
     *                          - <b>updated</b> - When the Object was updated.
     *                          - <b>updatedBy</b> - Which user that updated the Object.
     *                          - <b>dirty</b> - Whether the object has been modified since constructed.
     *                          - <b>propertySets</b> - The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     *                          - <b>discriminatorId</b> - The discriminator id of the extending class
     */
    public function __construct($parameters = [])
    {
        parent::__construct($parameters);

        $this->subFolders = [];
        $this->propertySets = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['subFolders'])) {
            $this->setSubFolders($parameters['subFolders']);
        }
        if (isset($parameters['savedSearch'])) {
            $this->setSavedSearch($parameters['savedSearch']);
        }
        if (isset($parameters['objectCount'])) {
            $this->setObjectCount($parameters['objectCount']);
        }
        if (isset($parameters['parentId'])) {
            $this->setParentId($parameters['parentId']);
        }
        if (isset($parameters['objectId'])) {
            $this->setObjectId($parameters['objectId']);
        }
        if (isset($parameters['created'])) {
            $this->setCreated($parameters['created']);
        }
        if (isset($parameters['createdBy'])) {
            $this->setCreatedBy($parameters['createdBy']);
        }
        if (isset($parameters['updated'])) {
            $this->setUpdated($parameters['updated']);
        }
        if (isset($parameters['updatedBy'])) {
            $this->setUpdatedBy($parameters['updatedBy']);
        }
        if (isset($parameters['dirty'])) {
            $this->setDirty($parameters['dirty']);
        }
        if (isset($parameters['propertySets'])) {
            $this->setPropertySets($parameters['propertySets']);
        }
        if (isset($parameters['discriminatorId'])) {
            $this->setDiscriminatorId($parameters['discriminatorId']);
        }
    }

    /**
     * Gets the id of the FolderResponse.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the FolderResponse.
     *
     * @param int $id
     *
     * @return FolderResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the subFolders of the FolderResponse.
     * @return FolderResponse[]	 */
    public function getSubFolders()
    {
        return $this->subFolders;
    }

    /**
     * Sets the "subFolders" of the FolderResponse.
     *
     * @param FolderResponse[] $subFolders
     *
     * @return FolderResponse
     */
    public function setSubFolders(array $subFolders)
    {
        $this->subFolders = [];

        foreach ($subFolders as $item) {
            $this->addFolderResponse($item);
        }

        return $this;
    }

    /**
     * Adds an object of "SubFolders" of the FolderResponse.
     *
     * @param FolderResponse|array $item
     *
     * @return FolderResponse
     */
    public function addFolderResponse($item)
    {
        if (!($item instanceof self)) {
            if (is_array($item)) {
                try {
                    $item = new self($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate FolderResponse. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "FolderResponse"!', E_USER_WARNING);
            }
        }
        $this->subFolders[] = $item;

        return $this;
    }

    /**
     * Gets the savedSearch of the FolderResponse.
     * @return SavedSearch	 */
    public function getSavedSearch()
    {
        return $this->savedSearch;
    }

    /**
     * Sets the "savedSearch" of the FolderResponse.
     *
     * @param SavedSearch $savedSearch
     *
     * @return FolderResponse
     */
    public function setSavedSearch($savedSearch)
    {
        if ($savedSearch instanceof SavedSearch) {
            $this->savedSearch = $savedSearch;
        } elseif (is_array($savedSearch)) {
            $this->savedSearch = new SavedSearch($savedSearch);
        } else {
            $this->savedSearch = null;
            trigger_error('Argument must be an object of class SavedSearch. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the objectCount of the FolderResponse.
     * @return int	 */
    public function getObjectCount()
    {
        return $this->objectCount;
    }

    /**
     * Sets the "objectCount" of the FolderResponse.
     *
     * @param int $objectCount
     *
     * @return FolderResponse
     */
    public function setObjectCount($objectCount)
    {
        $this->objectCount = $objectCount;

        return $this;
    }

    /**
     * Gets the parentId of the FolderResponse.
     * @return int	 */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Sets the "parentId" of the FolderResponse.
     *
     * @param int $parentId
     *
     * @return FolderResponse
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Gets the objectId of the FolderResponse.
     * @return int	 */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Sets the "objectId" of the FolderResponse.
     *
     * @param int $objectId
     *
     * @return FolderResponse
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Gets the created of the FolderResponse.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the FolderResponse.
     *
     * @param DateTime $created
     *
     * @return FolderResponse
     */
    public function setCreated($created)
    {
        if ($created instanceof DateTime) {
            $this->created = $created;
        } else {
            try {
                $this->created = new DateTime($created);
            } catch (\Exception $e) {
                $this->created = null;
            }
        }

        return $this;
    }

    /**
     * Gets the createdBy of the FolderResponse.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the FolderResponse.
     *
     * @param int $createdBy
     *
     * @return FolderResponse
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the FolderResponse.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the FolderResponse.
     *
     * @param DateTime $updated
     *
     * @return FolderResponse
     */
    public function setUpdated($updated)
    {
        if ($updated instanceof DateTime) {
            $this->updated = $updated;
        } else {
            try {
                $this->updated = new DateTime($updated);
            } catch (\Exception $e) {
                $this->updated = null;
            }
        }

        return $this;
    }

    /**
     * Gets the updatedBy of the FolderResponse.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the FolderResponse.
     *
     * @param int $updatedBy
     *
     * @return FolderResponse
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Tells whether the FolderResponse is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the FolderResponse.
     *
     * @param bool $dirty
     *
     * @return FolderResponse
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Gets the propertySets of the FolderResponse.
     * @return PropertySet[]	 */
    public function getPropertySets()
    {
        return $this->propertySets;
    }

    /**
     * Gets a property from the first available PropertySet.
     *
     * @param string $systemName the system name of the property to get
     *
     * @throws PropertyNotFoundException thrown if the requested property does not exist
     *
     * @return PropertyResponse
     */
    public function getProperty($systemName)
    {
        foreach ($this->propertySets as $propertySet) {
            /** @var PropertySet $propertySet */
            foreach ($propertySet->getProperties() as $property) {
                if ($property->getPropertyType()->getSystemName() == $systemName) {
                    return $property;
                }
            }
        }
        throw new PropertyNotFoundException('No Property with the system name "' . $systemName . '" exists.');
    }

    /**
     * Sets the "propertySets" of the FolderResponse.
     *
     * @param PropertySet[] $propertySets
     *
     * @return FolderResponse
     */
    public function setPropertySets(array $propertySets)
    {
        $this->propertySets = [];

        foreach ($propertySets as $item) {
            $this->addPropertySet($item);
        }

        return $this;
    }

    /**
     * Adds an object of "PropertySets" of the FolderResponse.
     *
     * @param PropertySet|array $item
     *
     * @return FolderResponse
     */
    public function addPropertySet($item)
    {
        if (!($item instanceof PropertySet)) {
            if (is_array($item)) {
                try {
                    $item = new PropertySet($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate PropertySet. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "PropertySet"!', E_USER_WARNING);
            }
        }
        $this->propertySets[] = $item;

        return $this;
    }

    /**
     * Gets the discriminatorId of the FolderResponse.
     * @return int	 */
    public function getDiscriminatorId()
    {
        return $this->discriminatorId;
    }

    /**
     * Sets the "discriminatorId" of the FolderResponse.
     *
     * @param int $discriminatorId
     *
     * @return FolderResponse
     */
    public function setDiscriminatorId($discriminatorId)
    {
        $this->discriminatorId = $discriminatorId;

        return $this;
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array an associative array of the available variables
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        if (null !== $this->id) {
            $json['id'] = $this->id;
        }
        if (null !== $this->subFolders && !empty($this->subFolders)) {
            $json['subFolders'] = $this->subFolders;
        }
        if (null !== $this->savedSearch) {
            $json['savedSearch'] = $this->savedSearch;
        }
        if (null !== $this->objectCount) {
            $json['objectCount'] = $this->objectCount;
        }
        if (null !== $this->parentId) {
            $json['parentId'] = $this->parentId;
        }
        if (null !== $this->objectId) {
            $json['objectId'] = $this->objectId;
        }
        if (null !== $this->created) {
            $json['created'] = $this->created->format(\DateTime::ATOM);
        }
        if (null !== $this->createdBy) {
            $json['createdBy'] = $this->createdBy;
        }
        if (null !== $this->updated) {
            $json['updated'] = $this->updated->format(\DateTime::ATOM);
        }
        if (null !== $this->updatedBy) {
            $json['updatedBy'] = $this->updatedBy;
        }
        if (null !== $this->dirty) {
            $json['dirty'] = $this->dirty;
        }
        if (null !== $this->propertySets && !empty($this->propertySets)) {
            $json['propertySets'] = $this->propertySets;
        }
        if (null !== $this->discriminatorId) {
            $json['discriminatorId'] = $this->discriminatorId;
        }

        foreach ($this->propertySets as $propertySet) {
            /** @var PropertySet $propertySet */
            foreach ($propertySet->getProperties() as $property) {
                /** @var Property $property */
                if (!isset($json['properties'][$property->getPropertyType()->getSystemName()])) {
                    if ($property->getValue() instanceof \DateTime) {
                        $json['properties'][$property->getPropertyType()->getSystemName()] = $property->getValue()->format(\DateTime::ATOM);
                    } else {
                        $json['properties'][$property->getPropertyType()->getSystemName()] = $property->getValue();
                    }
                }
            }
        }

        return $json;
    }
}
