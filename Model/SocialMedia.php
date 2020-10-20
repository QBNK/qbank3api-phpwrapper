<?php

namespace QBNK\QBank\API\Model;

class SocialMedia implements \JsonSerializable
{
    /** @var int The SocialMedia identifier. */
    protected $id;
    /** @var string The Objects name. */
    protected $name;
    /** @var bool Whether the object is deleted. */
    protected $deleted;
    /** @var string[] A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object. */
    protected $properties;
    /** @var int The identifier of the ObjectType describing the propertysets this object should use. */
    protected $typeId;

    /**
     * Constructs a SocialMedia.
     *
     * @param array $parameters An array of parameters to initialize the {@link SocialMedia} with.
     *                          - <b>id</b> - The SocialMedia identifier.
     *                          - <b>name</b> - The Objects name.
     *                          - <b>deleted</b> - Whether the object is deleted.
     *                          - <b>properties</b> - A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object.
     *                          - <b>typeId</b> - The identifier of the ObjectType describing the propertysets this object should use.
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
        if (isset($parameters['deleted'])) {
            $this->setDeleted($parameters['deleted']);
        }
        if (isset($parameters['properties'])) {
            $this->setProperties($parameters['properties']);
        }
        if (isset($parameters['typeId'])) {
            $this->setTypeId($parameters['typeId']);
        }
    }

    /**
     * Gets the id of the SocialMedia.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the SocialMedia.
     *
     * @param int $id
     *
     * @return SocialMedia
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the SocialMedia.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the SocialMedia.
     *
     * @param string $name
     *
     * @return SocialMedia
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Tells whether the SocialMedia is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the SocialMedia.
     *
     * @param bool $deleted
     *
     * @return SocialMedia
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the properties of the SocialMedia.
     * @return string[]	 */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets the "properties" of the SocialMedia.
     *
     * @param string[] $properties
     *
     * @return SocialMedia
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Gets the typeId of the SocialMedia.
     * @return int	 */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Sets the "typeId" of the SocialMedia.
     *
     * @param int $typeId
     *
     * @return SocialMedia
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

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
        if (null !== $this->deleted) {
            $json['deleted'] = $this->deleted;
        }
        if (null !== $this->properties && !empty($this->properties)) {
            $json['properties'] = $this->properties;
        }
        if (null !== $this->typeId) {
            $json['typeId'] = $this->typeId;
        }

        return $json;
    }
}
