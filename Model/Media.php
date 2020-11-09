<?php

namespace QBNK\QBank\API\Model;

class Media implements \JsonSerializable
{
    /** @var int The Category identifier of the Category the Media belongs to. */
    protected $categoryId;
    /** @var string The Media's filename. */
    protected $filename;
    /** @var int The Media parent Media identifier. Only set when the Media is grouped. */
    protected $parentId;
    /** @var int The Media replacement Media identifier. Only set when the Media has been replaced, ie. versioning. */
    protected $replacedBy;
    /** @var string The Objects name. */
    protected $name;
    /** @var bool Whether the object is deleted. */
    protected $deleted;
    /** @var string[] A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object. */
    protected $properties;
    /** @var int The identifier of the ObjectType describing the propertysets this object should use. */
    protected $typeId;

    /**
     * Constructs a Media.
     *
     * @param array $parameters An array of parameters to initialize the {@link Media} with.
     *                          - <b>categoryId</b> - The Category identifier of the Category the Media belongs to.
     *                          - <b>filename</b> - The Media's filename.
     *                          - <b>parentId</b> - The Media parent Media identifier. Only set when the Media is grouped.
     *                          - <b>replacedBy</b> - The Media replacement Media identifier. Only set when the Media has been replaced, ie. versioning.
     *                          - <b>name</b> - The Objects name.
     *                          - <b>deleted</b> - Whether the object is deleted.
     *                          - <b>properties</b> - A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object.
     *                          - <b>typeId</b> - The identifier of the ObjectType describing the propertysets this object should use.
     */
    public function __construct($parameters = [])
    {
        $this->properties = [];

        if (isset($parameters['categoryId'])) {
            $this->setCategoryId($parameters['categoryId']);
        }
        if (isset($parameters['filename'])) {
            $this->setFilename($parameters['filename']);
        }
        if (isset($parameters['parentId'])) {
            $this->setParentId($parameters['parentId']);
        }
        if (isset($parameters['replacedBy'])) {
            $this->setReplacedBy($parameters['replacedBy']);
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
     * Gets the categoryId of the Media.
     * @return int	 */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Sets the "categoryId" of the Media.
     *
     * @param int $categoryId
     *
     * @return Media
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Gets the filename of the Media.
     * @return string	 */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Sets the "filename" of the Media.
     *
     * @param string $filename
     *
     * @return Media
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Gets the parentId of the Media.
     * @return int	 */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Sets the "parentId" of the Media.
     *
     * @param int $parentId
     *
     * @return Media
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Gets the replacedBy of the Media.
     * @return int	 */
    public function getReplacedBy()
    {
        return $this->replacedBy;
    }

    /**
     * Sets the "replacedBy" of the Media.
     *
     * @param int $replacedBy
     *
     * @return Media
     */
    public function setReplacedBy($replacedBy)
    {
        $this->replacedBy = $replacedBy;

        return $this;
    }

    /**
     * Gets the name of the Media.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Media.
     *
     * @param string $name
     *
     * @return Media
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Tells whether the Media is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the Media.
     *
     * @param bool $deleted
     *
     * @return Media
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the properties of the Media.
     * @return string[]	 */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets the "properties" of the Media.
     *
     * @param string[] $properties
     *
     * @return Media
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Gets the typeId of the Media.
     * @return int	 */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Sets the "typeId" of the Media.
     *
     * @param int $typeId
     *
     * @return Media
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

        if (null !== $this->categoryId) {
            $json['categoryId'] = $this->categoryId;
        }
        if (null !== $this->filename) {
            $json['filename'] = $this->filename;
        }
        if (null !== $this->parentId) {
            $json['parentId'] = $this->parentId;
        }
        if (null !== $this->replacedBy) {
            $json['replacedBy'] = $this->replacedBy;
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
