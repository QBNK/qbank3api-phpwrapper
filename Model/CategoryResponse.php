<?php

namespace QBNK\QBank\API\Model;

use DateTime;
use QBNK\QBank\API\Exception\PropertyNotFoundException;

class CategoryResponse extends Category implements \JsonSerializable
{
    /** @var int The Category identifier. */
    protected $id;
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
     * Constructs a CategoryResponse.
     *
     * @param array $parameters An array of parameters to initialize the {@link CategoryResponse} with.
     *                          - <b>id</b> - The Category identifier.
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

        $this->propertySets = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
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
     * Gets the id of the CategoryResponse.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the CategoryResponse.
     *
     * @param int $id
     *
     * @return CategoryResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the objectId of the CategoryResponse.
     * @return int	 */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Sets the "objectId" of the CategoryResponse.
     *
     * @param int $objectId
     *
     * @return CategoryResponse
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Gets the created of the CategoryResponse.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the CategoryResponse.
     *
     * @param DateTime $created
     *
     * @return CategoryResponse
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
     * Gets the createdBy of the CategoryResponse.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the CategoryResponse.
     *
     * @param int $createdBy
     *
     * @return CategoryResponse
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the CategoryResponse.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the CategoryResponse.
     *
     * @param DateTime $updated
     *
     * @return CategoryResponse
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
     * Gets the updatedBy of the CategoryResponse.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the CategoryResponse.
     *
     * @param int $updatedBy
     *
     * @return CategoryResponse
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Tells whether the CategoryResponse is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the CategoryResponse.
     *
     * @param bool $dirty
     *
     * @return CategoryResponse
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Gets the propertySets of the CategoryResponse.
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
     * Sets the "propertySets" of the CategoryResponse.
     *
     * @param PropertySet[] $propertySets
     *
     * @return CategoryResponse
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
     * Adds an object of "PropertySets" of the CategoryResponse.
     *
     * @param PropertySet|array $item
     *
     * @return CategoryResponse
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
     * Gets the discriminatorId of the CategoryResponse.
     * @return int	 */
    public function getDiscriminatorId()
    {
        return $this->discriminatorId;
    }

    /**
     * Sets the "discriminatorId" of the CategoryResponse.
     *
     * @param int $discriminatorId
     *
     * @return CategoryResponse
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

        return $json;
    }
}
