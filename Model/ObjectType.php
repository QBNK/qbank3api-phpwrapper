<?php

namespace QBNK\QBank\API\Model;

use DateTime;
use QBNK\QBank\API\Exception\PropertyNotFoundException;

class ObjectType implements \JsonSerializable
{
    /** @var string The name of the ObjectType */
    protected $name;
    /** @var string A description of the ObjectType */
    protected $description;
    /** @var string The type of Object Type. */
    protected $type;
    /** @var int The id of the ObjectType */
    protected $id;
    /** @var DateTime When the ObjectType was created. */
    protected $created;
    /** @var int The identifier of the User who created the ObjectType. */
    protected $createdBy;
    /** @var DateTime When the ObjectType was updated. */
    protected $updated;
    /** @var int Which user that updated the ObjectType. */
    protected $updatedBy;
    /** @var PropertySet[] The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties. */
    protected $propertySets;
    /** @var bool Whether this ObjectType is deleted. */
    protected $deleted;

    /**
     * Constructs a ObjectType.
     *
     * @param array $parameters An array of parameters to initialize the {@link ObjectType} with.
     *                          - <b>name</b> - The name of the ObjectType
     *                          - <b>description</b> - A description of the ObjectType
     *                          - <b>type</b> - The type of Object Type.
     *                          - <b>id</b> - The id of the ObjectType
     *                          - <b>created</b> - When the ObjectType was created.
     *                          - <b>createdBy</b> - The identifier of the User who created the ObjectType.
     *                          - <b>updated</b> - When the ObjectType was updated.
     *                          - <b>updatedBy</b> - Which user that updated the ObjectType.
     *                          - <b>propertySets</b> - The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     *                          - <b>deleted</b> - Whether this ObjectType is deleted.
     */
    public function __construct($parameters = [])
    {
        $this->propertySets = [];

        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['description'])) {
            $this->setDescription($parameters['description']);
        }
        if (isset($parameters['type'])) {
            $this->setType($parameters['type']);
        }
        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
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
        if (isset($parameters['propertySets'])) {
            $this->setPropertySets($parameters['propertySets']);
        }
        if (isset($parameters['deleted'])) {
            $this->setDeleted($parameters['deleted']);
        }
    }

    /**
     * Gets the name of the ObjectType.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the ObjectType.
     *
     * @param string $name
     *
     * @return ObjectType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the description of the ObjectType.
     * @return string	 */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the "description" of the ObjectType.
     *
     * @param string $description
     *
     * @return ObjectType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the type of the ObjectType.
     * @return string	 */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the "type" of the ObjectType.
     *
     * @param string $type
     *
     * @return ObjectType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the id of the ObjectType.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the ObjectType.
     *
     * @param int $id
     *
     * @return ObjectType
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the created of the ObjectType.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the ObjectType.
     *
     * @param DateTime $created
     *
     * @return ObjectType
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
     * Gets the createdBy of the ObjectType.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the ObjectType.
     *
     * @param int $createdBy
     *
     * @return ObjectType
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the ObjectType.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the ObjectType.
     *
     * @param DateTime $updated
     *
     * @return ObjectType
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
     * Gets the updatedBy of the ObjectType.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the ObjectType.
     *
     * @param int $updatedBy
     *
     * @return ObjectType
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Gets the propertySets of the ObjectType.
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
     * Sets the "propertySets" of the ObjectType.
     *
     * @param PropertySet[] $propertySets
     *
     * @return ObjectType
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
     * Adds an object of "PropertySets" of the ObjectType.
     *
     * @param PropertySet|array $item
     *
     * @return ObjectType
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
     * Tells whether the ObjectType is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the ObjectType.
     *
     * @param bool $deleted
     *
     * @return ObjectType
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

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

        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->description) {
            $json['description'] = $this->description;
        }
        if (null !== $this->type) {
            $json['type'] = $this->type;
        }
        if (null !== $this->id) {
            $json['id'] = $this->id;
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
        if (null !== $this->propertySets && !empty($this->propertySets)) {
            $json['propertySets'] = $this->propertySets;
        }
        if (null !== $this->deleted) {
            $json['deleted'] = $this->deleted;
        }

        return $json;
    }
}
