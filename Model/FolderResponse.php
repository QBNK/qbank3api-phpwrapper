<?php

namespace QBNK\QBank\API\Model;

use DateTime;
use QBNK\QBank\API\Exception\PropertyNotFoundException;

class FolderResponse extends Folder implements \JsonSerializable
{
    /**
     * The Folder identifier.
     * @val int	 */
    protected $id;
    /**
     * The Folder's children, ie. subfolders.
     * @val Folder[]	 */
    protected $subFolders;
    /**
     * The base Object identifier.
     * @val int	 */
    protected $objectId;
    /**
     * When the Object was created.
     * @val DateTime	 */
    protected $created;
    /**
     * The identifier of the User who created the Object.
     * @val int	 */
    protected $createdBy;
    /**
     * When the Object was updated.
     * @val DateTime	 */
    protected $updated;
    /**
     * Which user who updated the Object.
     * @val int	 */
    protected $updatedBy;
    /**
     * Whether the object has been modified since constructed.
     * @val bool	 */
    protected $dirty;
    /**
     * The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     * @val PropertySet[]	 */
    protected $propertySets;

    /**
     * Constructs a FolderResponse.
     *
     * @param array $parameters An array of parameters to initialize the { @link FolderResponse } with.
     * - <b>id</b> - The Folder identifier.
     * - <b>subFolders</b> - The Folder's children, ie. subfolders.
     * - <b>objectId</b> - The base Object identifier.
     * - <b>created</b> - When the Object was created.
     * - <b>createdBy</b> - The identifier of the User who created the Object.
     * - <b>updated</b> - When the Object was updated.
     * - <b>updatedBy</b> - Which user who updated the Object.
     * - <b>dirty</b> - Whether the object has been modified since constructed.
     * - <b>propertySets</b> - The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     */
    public function __construct($parameters = [])
    {
        parent::__construct($parameters);

        $this->subFolders   = [];
        $this->propertySets = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['subFolders'])) {
            $this->setSubFolders($parameters['subFolders']);
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
        $this->id =  $id;

        return $this;
    }
    /**
     * Gets the subFolders of the FolderResponse.
     * @return Folder[]	 */
    public function getSubFolders()
    {
        return $this->subFolders;
    }

    /**
     * Sets the "subFolders" of the FolderResponse.
     *
     * @param Folder[] $subFolders
     *
     * @return FolderResponse
     */
    public function setSubFolders($subFolders)
    {
        if (is_array($subFolders)) {
            $this->subFolders = [];
            foreach ($subFolders as $item) {
                if (!($item instanceof Folder)) {
                    if (is_array($item)) {
                        try {
                            $item = new Folder($item);
                        } catch (\Exception $e) {
                            trigger_error('Could not auto-instantiate Folder. '.$e->getMessage(), E_USER_WARNING);
                        }
                    } else {
                        trigger_error('Array parameter item is not of expected type "Folder"!', E_USER_WARNING);
                        continue;
                    }
                }
                $this->subFolders[] = $item;
            }
        }

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
        $this->objectId =  $objectId;

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
        $this->createdBy =  $createdBy;

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
        $this->updatedBy =  $updatedBy;

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
        $this->dirty =  $dirty;

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
     * @param string $systemName The system name of the property to get.
     *
     * @throws PropertyNotFoundException Thrown if the requested property does not exist.
     *
     * @return Property
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
        throw new PropertyNotFoundException('No Property with the system name "'.$systemName.'" exists.');
    }

    /**
     * Sets the "propertySets" of the FolderResponse.
     *
     * @param PropertySet[] $propertySets
     *
     * @return FolderResponse
     */
    public function setPropertySets($propertySets)
    {
        if (is_array($propertySets)) {
            $this->propertySets = [];
            foreach ($propertySets as $item) {
                if (!($item instanceof PropertySet)) {
                    if (is_array($item)) {
                        try {
                            $item = new PropertySet($item);
                        } catch (\Exception $e) {
                            trigger_error('Could not auto-instantiate PropertySet. '.$e->getMessage(), E_USER_WARNING);
                        }
                    } else {
                        trigger_error('Array parameter item is not of expected type "PropertySet"!', E_USER_WARNING);
                        continue;
                    }
                }
                $this->propertySets[] = $item;
            }
        }

        return $this;
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array An associative array of the available variables.
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        if ($this->id !== null) {
            $json['id'] = $this->id;
        }
        if ($this->subFolders !== null && !empty($this->subFolders)) {
            $json['subFolders'] = $this->subFolders;
        }
        if ($this->objectId !== null) {
            $json['objectId'] = $this->objectId;
        }
        if ($this->created !== null) {
            $json['created'] = $this->created;
        }
        if ($this->createdBy !== null) {
            $json['createdBy'] = $this->createdBy;
        }
        if ($this->updated !== null) {
            $json['updated'] = $this->updated;
        }
        if ($this->updatedBy !== null) {
            $json['updatedBy'] = $this->updatedBy;
        }
        if ($this->dirty !== null) {
            $json['dirty'] = $this->dirty;
        }
        if ($this->propertySets !== null && !empty($this->propertySets)) {
            $json['propertySets'] = $this->propertySets;
        }

        return $json;
    }
}
