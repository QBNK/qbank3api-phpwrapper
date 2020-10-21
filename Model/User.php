<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class User implements \JsonSerializable
{
    /** @var int The User identifier. */
    protected $id;
    /** @var string The full name of the User. */
    protected $name;
    /** @var string Email-address of the User */
    protected $email;
    /** @var DateTime Optional last date this User can log in */
    protected $endDate;
    /** @var DateTime Optional first date this user can start logging in */
    protected $startDate;
    /** @var string First name of the User */
    protected $firstName;
    /** @var string Last name of the User */
    protected $lastName;
    /** @var string Username for the User */
    protected $userName;
    /** @var DateTime Last login time of the User */
    protected $lastLogin;
    /** @var Group[] An array of Groups this User is a member of (Note: this will be left as null when listing Users. */
    protected $groups;
    /** @var bool Whether the User has been modified since constructed. */
    protected $dirty;
    /** @var bool Indicates if this User is deleted */
    protected $deleted;
    /** @var DateTime When the User was created. */
    protected $created;
    /** @var int The User Id that created the User */
    protected $createdBy;
    /** @var DateTime When the User was updated. */
    protected $updated;
    /** @var int User Id that updated the User */
    protected $updatedBy;
    /** @var Functionality[] An array of Functionalities connected to this User */
    protected $functionalities;
    /** @var ExtraData[] An array of ExtraData connected to this User. */
    protected $extraData;
    /** @var string Type of user */
    protected $userType;

    /**
     * Constructs a User.
     *
     * @param array $parameters An array of parameters to initialize the {@link User} with.
     *                          - <b>id</b> - The User identifier.
     *                          - <b>name</b> - The full name of the User.
     *                          - <b>email</b> - Email-address of the User
     *                          - <b>endDate</b> - Optional last date this User can log in
     *                          - <b>startDate</b> - Optional first date this user can start logging in
     *                          - <b>firstName</b> - First name of the User
     *                          - <b>lastName</b> - Last name of the User
     *                          - <b>userName</b> - Username for the User
     *                          - <b>lastLogin</b> - Last login time of the User
     *                          - <b>groups</b> - An array of Groups this User is a member of (Note: this will be left as null when listing Users.
     *                          - <b>dirty</b> - Whether the User has been modified since constructed.
     *                          - <b>deleted</b> - Indicates if this User is deleted
     *                          - <b>created</b> - When the User was created.
     *                          - <b>createdBy</b> - The User Id that created the User
     *                          - <b>updated</b> - When the User was updated.
     *                          - <b>updatedBy</b> - User Id that updated the User
     *                          - <b>functionalities</b> - An array of Functionalities connected to this User
     *                          - <b>extraData</b> - An array of ExtraData connected to this User.
     *                          - <b>userType</b> - Type of user
     */
    public function __construct($parameters = [])
    {
        $this->groups = [];
        $this->functionalities = [];
        $this->extraData = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['email'])) {
            $this->setEmail($parameters['email']);
        }
        if (isset($parameters['endDate'])) {
            $this->setEndDate($parameters['endDate']);
        }
        if (isset($parameters['startDate'])) {
            $this->setStartDate($parameters['startDate']);
        }
        if (isset($parameters['firstName'])) {
            $this->setFirstName($parameters['firstName']);
        }
        if (isset($parameters['lastName'])) {
            $this->setLastName($parameters['lastName']);
        }
        if (isset($parameters['userName'])) {
            $this->setUserName($parameters['userName']);
        }
        if (isset($parameters['lastLogin'])) {
            $this->setLastLogin($parameters['lastLogin']);
        }
        if (isset($parameters['groups'])) {
            $this->setGroups($parameters['groups']);
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
        if (isset($parameters['extraData'])) {
            $this->setExtraData($parameters['extraData']);
        }
        if (isset($parameters['userType'])) {
            $this->setUserType($parameters['userType']);
        }
    }

    /**
     * Gets the id of the User.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the User.
     *
     * @param int $id
     *
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the User.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the User.
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the email of the User.
     * @return string	 */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the "email" of the User.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the endDate of the User.
     * @return DateTime	 */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets the "endDate" of the User.
     *
     * @param DateTime $endDate
     *
     * @return User
     */
    public function setEndDate($endDate)
    {
        if ($endDate instanceof DateTime) {
            $this->endDate = $endDate;
        } else {
            try {
                $this->endDate = new DateTime($endDate);
            } catch (\Exception $e) {
                $this->endDate = null;
            }
        }

        return $this;
    }

    /**
     * Gets the startDate of the User.
     * @return DateTime	 */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the "startDate" of the User.
     *
     * @param DateTime $startDate
     *
     * @return User
     */
    public function setStartDate($startDate)
    {
        if ($startDate instanceof DateTime) {
            $this->startDate = $startDate;
        } else {
            try {
                $this->startDate = new DateTime($startDate);
            } catch (\Exception $e) {
                $this->startDate = null;
            }
        }

        return $this;
    }

    /**
     * Gets the firstName of the User.
     * @return string	 */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets the "firstName" of the User.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Gets the lastName of the User.
     * @return string	 */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets the "lastName" of the User.
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Gets the userName of the User.
     * @return string	 */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Sets the "userName" of the User.
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Gets the lastLogin of the User.
     * @return DateTime	 */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Sets the "lastLogin" of the User.
     *
     * @param DateTime $lastLogin
     *
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        if ($lastLogin instanceof DateTime) {
            $this->lastLogin = $lastLogin;
        } else {
            try {
                $this->lastLogin = new DateTime($lastLogin);
            } catch (\Exception $e) {
                $this->lastLogin = null;
            }
        }

        return $this;
    }

    /**
     * Gets the groups of the User.
     * @return Group[]	 */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Sets the "groups" of the User.
     *
     * @param Group[] $groups
     *
     * @return User
     */
    public function setGroups(array $groups)
    {
        $this->groups = [];

        foreach ($groups as $item) {
            $this->addGroup($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Groups" of the User.
     *
     * @param Group|array $item
     *
     * @return User
     */
    public function addGroup($item)
    {
        if (!($item instanceof Group)) {
            if (is_array($item)) {
                try {
                    $item = new Group($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate Group. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "Group"!', E_USER_WARNING);
            }
        }
        $this->groups[] = $item;

        return $this;
    }

    /**
     * Tells whether the User is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the User.
     *
     * @param bool $dirty
     *
     * @return User
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Tells whether the User is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the User.
     *
     * @param bool $deleted
     *
     * @return User
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the created of the User.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the User.
     *
     * @param DateTime $created
     *
     * @return User
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
     * Gets the createdBy of the User.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the User.
     *
     * @param int $createdBy
     *
     * @return User
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the User.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the User.
     *
     * @param DateTime $updated
     *
     * @return User
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
     * Gets the updatedBy of the User.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the User.
     *
     * @param int $updatedBy
     *
     * @return User
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Gets the functionalities of the User.
     * @return Functionality[]	 */
    public function getFunctionalities()
    {
        return $this->functionalities;
    }

    /**
     * Sets the "functionalities" of the User.
     *
     * @param Functionality[] $functionalities
     *
     * @return User
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
     * Adds an object of "Functionalities" of the User.
     *
     * @param Functionality|array $item
     *
     * @return User
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
     * Gets the extraData of the User.
     * @return ExtraData[]	 */
    public function getExtraData()
    {
        return $this->extraData;
    }

    /**
     * Sets the "extraData" of the User.
     *
     * @param ExtraData[] $extraData
     *
     * @return User
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
     * Adds an object of "ExtraData" of the User.
     *
     * @param ExtraData|array $item
     *
     * @return User
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
     * Gets the userType of the User.
     * @return string	 */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Sets the "userType" of the User.
     *
     * @param string $userType
     *
     * @return User
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

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
        if (null !== $this->email) {
            $json['email'] = $this->email;
        }
        if (null !== $this->endDate) {
            $json['endDate'] = $this->endDate->format(\DateTime::ATOM);
        }
        if (null !== $this->startDate) {
            $json['startDate'] = $this->startDate->format(\DateTime::ATOM);
        }
        if (null !== $this->firstName) {
            $json['firstName'] = $this->firstName;
        }
        if (null !== $this->lastName) {
            $json['lastName'] = $this->lastName;
        }
        if (null !== $this->userName) {
            $json['userName'] = $this->userName;
        }
        if (null !== $this->lastLogin) {
            $json['lastLogin'] = $this->lastLogin->format(\DateTime::ATOM);
        }
        if (null !== $this->groups && !empty($this->groups)) {
            $json['groups'] = $this->groups;
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
        if (null !== $this->extraData && !empty($this->extraData)) {
            $json['extraData'] = $this->extraData;
        }
        if (null !== $this->userType) {
            $json['userType'] = $this->userType;
        }

        return $json;
    }
}
