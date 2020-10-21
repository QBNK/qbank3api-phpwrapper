<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class Role implements \JsonSerializable
{
    /** @var int The Role identifier. */
    protected $id;
    /** @var string The name of the Role */
    protected $name;
    /** @var string Description of what this Role means */
    protected $description;
    /** @var bool Whether the object has been modified since constructed. */
    protected $dirty;
    /** @var bool Indicates if this Role is deleted */
    protected $deleted;
    /** @var DateTime When the Role was created. */
    protected $created;
    /** @var int The User Id that created the Role */
    protected $createdBy;
    /** @var DateTime When the Role was updated. */
    protected $updated;
    /** @var int User Id that updated the Role */
    protected $updatedBy;
    /** @var Functionality[] An array of Functionalities connected to this role */
    protected $functionalities;

    /**
     * Constructs a Role.
     *
     * @param array $parameters An array of parameters to initialize the {@link Role} with.
     *                          - <b>id</b> - The Role identifier.
     *                          - <b>name</b> - The name of the Role
     *                          - <b>description</b> - Description of what this Role means
     *                          - <b>dirty</b> - Whether the object has been modified since constructed.
     *                          - <b>deleted</b> - Indicates if this Role is deleted
     *                          - <b>created</b> - When the Role was created.
     *                          - <b>createdBy</b> - The User Id that created the Role
     *                          - <b>updated</b> - When the Role was updated.
     *                          - <b>updatedBy</b> - User Id that updated the Role
     *                          - <b>functionalities</b> - An array of Functionalities connected to this role
     */
    public function __construct($parameters = [])
    {
        $this->functionalities = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['description'])) {
            $this->setDescription($parameters['description']);
        }
        if (isset($parameters['dirty'])) {
            $this->setDirty($parameters['dirty']);
        }
        if (isset($parameters['deleted'])) {
            $this->setDeleted($parameters['deleted']);
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
        if (isset($parameters['functionalities'])) {
            $this->setFunctionalities($parameters['functionalities']);
        }
    }

    /**
     * Gets the id of the Role.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the Role.
     *
     * @param int $id
     *
     * @return Role
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the Role.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Role.
     *
     * @param string $name
     *
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the description of the Role.
     * @return string	 */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the "description" of the Role.
     *
     * @param string $description
     *
     * @return Role
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Tells whether the Role is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the Role.
     *
     * @param bool $dirty
     *
     * @return Role
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Tells whether the Role is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the Role.
     *
     * @param bool $deleted
     *
     * @return Role
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the created of the Role.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the Role.
     *
     * @param DateTime $created
     *
     * @return Role
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
     * Gets the createdBy of the Role.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the Role.
     *
     * @param int $createdBy
     *
     * @return Role
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the Role.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the Role.
     *
     * @param DateTime $updated
     *
     * @return Role
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
     * Gets the updatedBy of the Role.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the Role.
     *
     * @param int $updatedBy
     *
     * @return Role
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Gets the functionalities of the Role.
     * @return Functionality[]	 */
    public function getFunctionalities()
    {
        return $this->functionalities;
    }

    /**
     * Sets the "functionalities" of the Role.
     *
     * @param Functionality[] $functionalities
     *
     * @return Role
     */
    public function setFunctionalities(array $functionalities)
    {
        $this->functionalities = [];

        foreach ($functionalities as $item) {
            $this->addFunctionality($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Functionalities" of the Role.
     *
     * @param Functionality|array $item
     *
     * @return Role
     */
    public function addFunctionality($item)
    {
        if (!($item instanceof Functionality)) {
            if (is_array($item)) {
                try {
                    $item = new Functionality($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate Functionality. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "Functionality"!', E_USER_WARNING);
            }
        }
        $this->functionalities[] = $item;

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
        if (null !== $this->description) {
            $json['description'] = $this->description;
        }
        if (null !== $this->dirty) {
            $json['dirty'] = $this->dirty;
        }
        if (null !== $this->deleted) {
            $json['deleted'] = $this->deleted;
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
        if (null !== $this->functionalities && !empty($this->functionalities)) {
            $json['functionalities'] = $this->functionalities;
        }

        return $json;
    }
}
