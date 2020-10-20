<?php

namespace QBNK\QBank\API\Model;

class Category implements \JsonSerializable
{
    /** @var int The ObjectType identifier Media belonging to this Category should have. */
    protected $mediaTypeId;
    /** @var string An optional description for the category */
    protected $description;
    /** @var string The Objects name. */
    protected $name;
    /** @var bool Whether the object is deleted. */
    protected $deleted;
    /** @var string[] A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object. */
    protected $properties;
    /** @var int The identifier of the ObjectType describing the propertysets this object should use. */
    protected $typeId;

    /**
     * Constructs a Category.
     *
     * @param array $parameters An array of parameters to initialize the {@link Category} with.
     *                          - <b>mediaTypeId</b> - The ObjectType identifier Media belonging to this Category should have.
     *                          - <b>description</b> - An optional description for the category
     *                          - <b>name</b> - The Objects name.
     *                          - <b>deleted</b> - Whether the object is deleted.
     *                          - <b>properties</b> - A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object.
     *                          - <b>typeId</b> - The identifier of the ObjectType describing the propertysets this object should use.
     */
    public function __construct($parameters = [])
    {
        $this->properties = [];

        if (isset($parameters['mediaTypeId'])) {
            $this->setMediaTypeId($parameters['mediaTypeId']);
        }
        if (isset($parameters['description'])) {
            $this->setDescription($parameters['description']);
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
     * Gets the mediaTypeId of the Category.
     * @return int	 */
    public function getMediaTypeId()
    {
        return $this->mediaTypeId;
    }

    /**
     * Sets the "mediaTypeId" of the Category.
     *
     * @param int $mediaTypeId
     *
     * @return Category
     */
    public function setMediaTypeId($mediaTypeId)
    {
        $this->mediaTypeId = $mediaTypeId;

        return $this;
    }

    /**
     * Gets the description of the Category.
     * @return string	 */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the "description" of the Category.
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the name of the Category.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Category.
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Tells whether the Category is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the Category.
     *
     * @param bool $deleted
     *
     * @return Category
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the properties of the Category.
     * @return string[]	 */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets the "properties" of the Category.
     *
     * @param string[] $properties
     *
     * @return Category
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Gets the typeId of the Category.
     * @return int	 */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Sets the "typeId" of the Category.
     *
     * @param int $typeId
     *
     * @return Category
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

        if (null !== $this->mediaTypeId) {
            $json['mediaTypeId'] = $this->mediaTypeId;
        }
        if (null !== $this->description) {
            $json['description'] = $this->description;
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
