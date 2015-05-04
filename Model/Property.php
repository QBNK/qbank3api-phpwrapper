<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class Property  implements \JsonSerializable
{
    const TEMPLATE_IMAGE = 'image';
    const TEMPLATE_VIDEO = 'video';

    /** @var DateTime When the Property was created. */
    protected $created;

    /** @var int The identifier of the User who created the Property. */
    protected $createdBy;

    /** @var DateTime When the Property was updated. */
    protected $updated;

    /** @var int Which user who updated the Property. */
    protected $updatedBy;

    /** @var bool Whether the Property is deleted. */
    protected $deleted;

    /** @var bool Whether the Property has been modified since constructed. */
    protected $dirty;

    /** @var PropertyType The PropertyType describing this Property. */
    protected $propertyType;

    /** @var string The value of the Property. */
    protected $value;

    /**
     * Constructs a Property.
     *
     * @param array $parameters An array of parameters to initialize the { @link Property } with.
     * - <b>created</b> - When the Property was created.
     * - <b>createdBy</b> - The identifier of the User who created the Property.
     * - <b>updated</b> - When the Property was updated.
     * - <b>updatedBy</b> - Which user who updated the Property.
     * - <b>deleted</b> - Whether the Property is deleted.
     * - <b>dirty</b> - Whether the Property has been modified since constructed.
     * - <b>propertyType</b> - The PropertyType describing this Property.
     * - <b>value</b> - The value of the Property.
     */
    public function __construct($parameters = [])
    {
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
        if (isset($parameters['propertyType'])) {
            $this->setPropertyType($parameters['propertyType']);
        }
        if (isset($parameters['value'])) {
            $this->setValue($parameters['value']);
        }
    }

    /**
     * Gets the created of the Property.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the Property.
     *
     * @param DateTime $created
     *
     * @return Property
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
     * Gets the createdBy of the Property.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the Property.
     *
     * @param int $createdBy
     *
     * @return Property
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy =  $createdBy;

        return $this;
    }
    /**
     * Gets the updated of the Property.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the Property.
     *
     * @param DateTime $updated
     *
     * @return Property
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
     * Gets the updatedBy of the Property.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the Property.
     *
     * @param int $updatedBy
     *
     * @return Property
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy =  $updatedBy;

        return $this;
    }
    /**
     * Tells whether the Property is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the Property.
     *
     * @param bool $deleted
     *
     * @return Property
     */
    public function setDeleted($deleted)
    {
        $this->deleted =  $deleted;

        return $this;
    }
    /**
     * Tells whether the Property is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the Property.
     *
     * @param bool $dirty
     *
     * @return Property
     */
    public function setDirty($dirty)
    {
        $this->dirty =  $dirty;

        return $this;
    }
    /**
     * Gets the propertyType of the Property.
     * @return PropertyType	 */
    public function getPropertyType()
    {
        return $this->propertyType;
    }

    /**
     * Sets the "propertyType" of the Property.
     *
     * @param PropertyType $propertyType
     *
     * @return Property
     */
    public function setPropertyType($propertyType)
    {
        if ($propertyType instanceof PropertyType) {
            $this->propertyType = $propertyType;
        } elseif (is_array($propertyType)) {
            $this->propertyType = new PropertyType($propertyType);
        } else {
            $this->propertyType = null;
            trigger_error('Argument must be an object of class PropertyType. Data loss!', E_USER_WARNING);
        }

        return $this;
    }
    /**
     * Gets the value of the Property.
     * @return string	 */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the "value" of the Property.
     *
     * @param mixed $value
     *
     * @return Property
     */
    public function setValue($value)
    {
        $definition = $this->propertyType->getDefinition();
        if (!empty($definition['array'])) {
            if (empty($definition['multiplechoice']) && isset($definition['options']) && is_array($definition['options'])) {
                $this->value = $this->convertValue(current($value)['value']);
            } else {
                $this->value = [];
                foreach ($value as $v) {
                    $this->value[] = $this->convertValue($v['value']);
                }
            }
        } else {
            $this->value = $this->convertValue($value);
        }

        return $this;
    }

    /**
     * Converts a value to the corresponding PHP type.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    protected function convertValue($value)
    {
        switch ($this->propertyType->getDataTypeId()) {
            case PropertyType::DATATYPE_BOOLEAN:
                return (bool) $value;
                break;
            case PropertyType::DATATYPE_DATETIME:
                if ($value instanceof \DateTime) {
                    return $value;
                } else {
                    try {
                        return new \DateTime($value);
                    } catch (\Exception $e) {
                        return;
                    }
                }
                break;
            case PropertyType::DATATYPE_FLOAT:
                return (float) $value;
                break;
            case PropertyType::DATATYPE_INTEGER:
                return (int) $value;
                break;
            case PropertyType::DATATYPE_STRING:
                return (string) $value;
                break;
            default:
                return $value;
                break;
        }
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array An associative array of the available variables.
     */
    public function jsonSerialize()
    {
        $json = [];

        if ($this->created !== null) {
            $json['created'] = $this->created->format(\DateTime::ISO8601);
        }
        if ($this->createdBy !== null) {
            $json['createdBy'] = $this->createdBy;
        }
        if ($this->updated !== null) {
            $json['updated'] = $this->updated->format(\DateTime::ISO8601);
        }
        if ($this->updatedBy !== null) {
            $json['updatedBy'] = $this->updatedBy;
        }
        if ($this->deleted !== null) {
            $json['deleted'] = $this->deleted;
        }
        if ($this->dirty !== null) {
            $json['dirty'] = $this->dirty;
        }
        if ($this->propertyType !== null) {
            $json['propertyType'] = $this->propertyType;
        }
        if ($this->value !== null) {
            if ($this->value instanceof \DateTime) {
                $json['value'] = $this->value->format(\DateTime::ISO8601);
            } else {
                $json['value'] = $this->value;
            }
        }

        return $json;
    }
}
