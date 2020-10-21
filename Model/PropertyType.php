<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class PropertyType implements \JsonSerializable
{
    const DATATYPE_BOOLEAN = 1;
    const DATATYPE_DATETIME = 2;
    const DATATYPE_DECIMAL = 3;
    const DATATYPE_FLOAT = 4;
    const DATATYPE_INTEGER = 5;
    const DATATYPE_STRING = 6;

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
    /** @var string The Property name. */
    protected $name;
    /** @var string The Property system name, this is used for programmatic access. */
    protected $systemName;
    /** @var string A description of the PropertyType. */
    protected $description;
    /** @var int Data type for the Property (1: Boolean, 2: DateTime, 3: Decimal, 4: Float, 5: Integer, 6: String) In addition, definition can alter the way a Property should be displayed. */
    protected $dataTypeId;
    /** @var object A Key/Value Object containing extra information about how this Property should be used. */
    protected $definition;

    /**
     * Constructs a PropertyType.
     *
     * @param array $parameters An array of parameters to initialize the {@link PropertyType} with.
     *                          - <b>created</b> - When the Property was created.
     *                          - <b>createdBy</b> - The identifier of the User who created the Property.
     *                          - <b>updated</b> - When the Property was updated.
     *                          - <b>updatedBy</b> - Which user who updated the Property.
     *                          - <b>deleted</b> - Whether the Property is deleted.
     *                          - <b>name</b> - The Property name.
     *                          - <b>systemName</b> - The Property system name, this is used for programmatic access.
     *                          - <b>description</b> - A description of the PropertyType.
     *                          - <b>dataTypeId</b> - Data type for the Property (1: Boolean, 2: DateTime, 3: Decimal, 4: Float, 5: Integer, 6: String) In addition, definition can alter the way a Property should be displayed.
     *                          - <b>definition</b> - A Key/Value Object containing extra information about how this Property should be used.
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
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['systemName'])) {
            $this->setSystemName($parameters['systemName']);
        }
        if (isset($parameters['description'])) {
            $this->setDescription($parameters['description']);
        }
        if (isset($parameters['dataTypeId'])) {
            $this->setDataTypeId($parameters['dataTypeId']);
        }
        if (isset($parameters['definition'])) {
            $this->setDefinition($parameters['definition']);
        }
    }

    /**
     * Gets the created of the PropertyType.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the PropertyType.
     *
     * @param DateTime $created
     *
     * @return PropertyType
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
     * Gets the createdBy of the PropertyType.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the PropertyType.
     *
     * @param int $createdBy
     *
     * @return PropertyType
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the PropertyType.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the PropertyType.
     *
     * @param DateTime $updated
     *
     * @return PropertyType
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
     * Gets the updatedBy of the PropertyType.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the PropertyType.
     *
     * @param int $updatedBy
     *
     * @return PropertyType
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Tells whether the PropertyType is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the PropertyType.
     *
     * @param bool $deleted
     *
     * @return PropertyType
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the name of the PropertyType.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the PropertyType.
     *
     * @param string $name
     *
     * @return PropertyType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the systemName of the PropertyType.
     * @return string	 */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * Sets the "systemName" of the PropertyType.
     *
     * @param string $systemName
     *
     * @return PropertyType
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;

        return $this;
    }

    /**
     * Gets the description of the PropertyType.
     * @return string	 */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the "description" of the PropertyType.
     *
     * @param string $description
     *
     * @return PropertyType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the dataTypeId of the PropertyType.
     * @return int	 */
    public function getDataTypeId()
    {
        return $this->dataTypeId;
    }

    /**
     * Sets the "dataTypeId" of the PropertyType.
     *
     * @param int $dataTypeId
     *
     * @return PropertyType
     */
    public function setDataTypeId($dataTypeId)
    {
        $this->dataTypeId = $dataTypeId;

        return $this;
    }

    /**
     * Gets the definition of the PropertyType.
     * @return object	 */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Sets the "definition" of the PropertyType.
     *
     * @param array|string $definition
     *
     * @return PropertyType
     */
    public function setDefinition($definition)
    {
        if (is_array($definition)) {
            $this->definition = $definition;

            return $this;
        }
        $this->definition = json_decode($definition, true);
        if (null === $this->definition) {
            $this->definition = $definition;
        }

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
        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->systemName) {
            $json['systemName'] = $this->systemName;
        }
        if (null !== $this->description) {
            $json['description'] = $this->description;
        }
        if (null !== $this->dataTypeId) {
            $json['dataTypeId'] = $this->dataTypeId;
        }
        if (null !== $this->definition) {
            $json['definition'] = $this->definition;
        }

        return $json;
    }
}
