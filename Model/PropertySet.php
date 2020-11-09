<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class PropertySet implements \JsonSerializable
{
    /** @var int The PropertySet identifier */
    protected $id;
    /** @var string The PropertySet name. */
    protected $name;
    /** @var DateTime When the PropertySet was created. */
    protected $created;
    /** @var int The identifier of the User who created the PropertySet. */
    protected $createdBy;
    /** @var DateTime When the PropertySet was updated. */
    protected $updated;
    /** @var int Which user who updated the PropertySet. */
    protected $updatedBy;
    /** @var bool Whether the PropertySet is deleted. */
    protected $deleted;
    /** @var bool Whether the PropertySet has been modified since constructed. */
    protected $dirty;
    /** @var bool Wheater the PropertySet is a system propertyset or not. (System propertysets are hidden from the enduser) */
    protected $system;
    /** @var PropertyResponse[] The Properties associated with the PropertySet. */
    protected $properties;

    /**
     * Constructs a PropertySet.
     *
     * @param array $parameters An array of parameters to initialize the {@link PropertySet} with.
     *                          - <b>id</b> - The PropertySet identifier
     *                          - <b>name</b> - The PropertySet name.
     *                          - <b>created</b> - When the PropertySet was created.
     *                          - <b>createdBy</b> - The identifier of the User who created the PropertySet.
     *                          - <b>updated</b> - When the PropertySet was updated.
     *                          - <b>updatedBy</b> - Which user who updated the PropertySet.
     *                          - <b>deleted</b> - Whether the PropertySet is deleted.
     *                          - <b>dirty</b> - Whether the PropertySet has been modified since constructed.
     *                          - <b>system</b> - Wheater the PropertySet is a system propertyset or not. (System propertysets are hidden from the enduser)
     *                          - <b>properties</b> - The Properties associated with the PropertySet.
     */
    public function __construct($parameters = [])
    {
        $this->properties = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
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
        if (isset($parameters['deleted'])) {
            $this->setDeleted($parameters['deleted']);
        }
        if (isset($parameters['dirty'])) {
            $this->setDirty($parameters['dirty']);
        }
        if (isset($parameters['system'])) {
            $this->setSystem($parameters['system']);
        }
        if (isset($parameters['properties'])) {
            $this->setProperties($parameters['properties']);
        }
    }

    /**
     * Gets the id of the PropertySet.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the PropertySet.
     *
     * @param int $id
     *
     * @return PropertySet
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the PropertySet.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the PropertySet.
     *
     * @param string $name
     *
     * @return PropertySet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the created of the PropertySet.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the PropertySet.
     *
     * @param DateTime $created
     *
     * @return PropertySet
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
     * Gets the createdBy of the PropertySet.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the PropertySet.
     *
     * @param int $createdBy
     *
     * @return PropertySet
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the PropertySet.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the PropertySet.
     *
     * @param DateTime $updated
     *
     * @return PropertySet
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
     * Gets the updatedBy of the PropertySet.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the PropertySet.
     *
     * @param int $updatedBy
     *
     * @return PropertySet
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Tells whether the PropertySet is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the PropertySet.
     *
     * @param bool $deleted
     *
     * @return PropertySet
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Tells whether the PropertySet is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the PropertySet.
     *
     * @param bool $dirty
     *
     * @return PropertySet
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Tells whether the PropertySet is system.
     * @return bool	 */
    public function isSystem()
    {
        return $this->system;
    }

    /**
     * Sets the "system" of the PropertySet.
     *
     * @param bool $system
     *
     * @return PropertySet
     */
    public function setSystem($system)
    {
        $this->system = $system;

        return $this;
    }

    /**
     * Gets the properties of the PropertySet.
     * @return PropertyResponse[]	 */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets the "properties" of the PropertySet.
     *
     * @param PropertyResponse[] $properties
     *
     * @return PropertySet
     */
    public function setProperties(array $properties)
    {
        $this->properties = [];

        foreach ($properties as $item) {
            $this->addPropertyResponse($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Properties" of the PropertySet.
     *
     * @param PropertyResponse|array $item
     *
     * @return PropertySet
     */
    public function addPropertyResponse($item)
    {
        if (!($item instanceof PropertyResponse)) {
            if (is_array($item)) {
                try {
                    $item = new PropertyResponse($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate PropertyResponse. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "PropertyResponse"!', E_USER_WARNING);
            }
        }
        $this->properties[] = $item;

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

        if (null !== $this->id) {
            $json['id'] = $this->id;
        }
        if (null !== $this->name) {
            $json['name'] = $this->name;
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
        if (null !== $this->deleted) {
            $json['deleted'] = $this->deleted;
        }
        if (null !== $this->dirty) {
            $json['dirty'] = $this->dirty;
        }
        if (null !== $this->system) {
            $json['system'] = $this->system;
        }
        if (null !== $this->properties && !empty($this->properties)) {
            $json['properties'] = $this->properties;
        }

        return $json;
    }
}
