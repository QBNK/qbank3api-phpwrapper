<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class Group implements \JsonSerializable
{
    /** @var int The Group identifier. */
    protected $id;
    /** @var string The name of the Group */
    protected $name;
    /** @var string Description of what this Group means */
    protected $description;
    /** @var bool Whether the object has been modified since constructed. */
    protected $dirty;
    /** @var bool Indicates if this Group is deleted */
    protected $deleted;
    /** @var DateTime When the Group was created. */
    protected $created;
    /** @var int The User Id that created the Group */
    protected $createdBy;
    /** @var DateTime When the Group was updated. */
    protected $updated;
    /** @var int User Id that updated the Group */
    protected $updatedBy;
    /** @var Functionality[] An array of Functionalities connected to this Group */
    protected $functionalities;
    /** @var Role[] An array of Roles connected to this Group */
    protected $roles;
    /** @var ExtraData[] An array of ExtraData connected to this Group. */
    protected $extraData;
    /** @var User[] An array of the Users that members of this Group. */
    protected $users;

    /**
     * Constructs a Group.
     *
     * @param array $parameters An array of parameters to initialize the {@link Group} with.
     *                          - <b>id</b> - The Group identifier.
     *                          - <b>name</b> - The name of the Group
     *                          - <b>description</b> - Description of what this Group means
     *                          - <b>dirty</b> - Whether the object has been modified since constructed.
     *                          - <b>deleted</b> - Indicates if this Group is deleted
     *                          - <b>created</b> - When the Group was created.
     *                          - <b>createdBy</b> - The User Id that created the Group
     *                          - <b>updated</b> - When the Group was updated.
     *                          - <b>updatedBy</b> - User Id that updated the Group
     *                          - <b>functionalities</b> - An array of Functionalities connected to this Group
     *                          - <b>roles</b> - An array of Roles connected to this Group
     *                          - <b>extraData</b> - An array of ExtraData connected to this Group.
     *                          - <b>users</b> - An array of the Users that members of this Group.
     */
    public function __construct($parameters = [])
    {
        $this->functionalities = [];
        $this->roles = [];
        $this->extraData = [];
        $this->users = [];

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
        if (isset($parameters['roles'])) {
            $this->setRoles($parameters['roles']);
        }
        if (isset($parameters['extraData'])) {
            $this->setExtraData($parameters['extraData']);
        }
        if (isset($parameters['users'])) {
            $this->setUsers($parameters['users']);
        }
    }

    /**
     * Gets the id of the Group.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the Group.
     *
     * @param int $id
     *
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the Group.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Group.
     *
     * @param string $name
     *
     * @return Group
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the description of the Group.
     * @return string	 */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the "description" of the Group.
     *
     * @param string $description
     *
     * @return Group
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Tells whether the Group is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the Group.
     *
     * @param bool $dirty
     *
     * @return Group
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Tells whether the Group is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the Group.
     *
     * @param bool $deleted
     *
     * @return Group
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the created of the Group.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the Group.
     *
     * @param DateTime $created
     *
     * @return Group
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
     * Gets the createdBy of the Group.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the Group.
     *
     * @param int $createdBy
     *
     * @return Group
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the Group.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the Group.
     *
     * @param DateTime $updated
     *
     * @return Group
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
     * Gets the updatedBy of the Group.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the Group.
     *
     * @param int $updatedBy
     *
     * @return Group
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Gets the functionalities of the Group.
     * @return Functionality[]	 */
    public function getFunctionalities()
    {
        return $this->functionalities;
    }

    /**
     * Sets the "functionalities" of the Group.
     *
     * @param Functionality[] $functionalities
     *
     * @return Group
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
     * Adds an object of "Functionalities" of the Group.
     *
     * @param Functionality|array $item
     *
     * @return Group
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
     * Gets the roles of the Group.
     * @return Role[]	 */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Sets the "roles" of the Group.
     *
     * @param Role[] $roles
     *
     * @return Group
     */
    public function setRoles(array $roles)
    {
        $this->roles = [];

        foreach ($roles as $item) {
            $this->addRole($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Roles" of the Group.
     *
     * @param Role|array $item
     *
     * @return Group
     */
    public function addRole($item)
    {
        if (!($item instanceof Role)) {
            if (is_array($item)) {
                try {
                    $item = new Role($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate Role. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "Role"!', E_USER_WARNING);
            }
        }
        $this->roles[] = $item;

        return $this;
    }

    /**
     * Gets the extraData of the Group.
     * @return ExtraData[]	 */
    public function getExtraData()
    {
        return $this->extraData;
    }

    /**
     * Sets the "extraData" of the Group.
     *
     * @param ExtraData[] $extraData
     *
     * @return Group
     */
    public function setExtraData(array $extraData)
    {
        $this->extraData = [];

        foreach ($extraData as $item) {
            $this->addExtraData($item);
        }

        return $this;
    }

    /**
     * Adds an object of "ExtraData" of the Group.
     *
     * @param ExtraData|array $item
     *
     * @return Group
     */
    public function addExtraData($item)
    {
        if (!($item instanceof ExtraData)) {
            if (is_array($item)) {
                try {
                    $item = new ExtraData($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate ExtraData. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "ExtraData"!', E_USER_WARNING);
            }
        }
        $this->extraData[] = $item;

        return $this;
    }

    /**
     * Gets the users of the Group.
     * @return User[]	 */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Sets the "users" of the Group.
     *
     * @param User[] $users
     *
     * @return Group
     */
    public function setUsers(array $users)
    {
        $this->users = [];

        foreach ($users as $item) {
            $this->addUser($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Users" of the Group.
     *
     * @param User|array $item
     *
     * @return Group
     */
    public function addUser($item)
    {
        if (!($item instanceof User)) {
            if (is_array($item)) {
                try {
                    $item = new User($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate User. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "User"!', E_USER_WARNING);
            }
        }
        $this->users[] = $item;

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
        if (null !== $this->roles && !empty($this->roles)) {
            $json['roles'] = $this->roles;
        }
        if (null !== $this->extraData && !empty($this->extraData)) {
            $json['extraData'] = $this->extraData;
        }
        if (null !== $this->users && !empty($this->users)) {
            $json['users'] = $this->users;
        }

        return $json;
    }
}
