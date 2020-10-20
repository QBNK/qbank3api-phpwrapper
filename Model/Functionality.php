<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class Functionality implements \JsonSerializable
{
    /** @var int The Functionality identifier. */
    protected $id;
    /** @var string The name of the functionality (used programmatically) */
    protected $name;
    /** @var string Description of what this functionality means */
    protected $description;
    /** @var bool Whether the object has been modified since constructed. */
    protected $dirty;
    /** @var bool Indicates if this Functionality is deleted */
    protected $deleted;
    /** @var DateTime When the Functionality was created. */
    protected $created;
    /** @var int The User Id that created the Functionality */
    protected $createdBy;
    /** @var DateTime When the Functionality was updated. */
    protected $updated;
    /** @var int User Id that updated the Functionality */
    protected $updatedBy;
    /** @var string A title that can be used to show the user */
    protected $title;

    /**
     * Constructs a Functionality.
     *
     * @param array $parameters An array of parameters to initialize the {@link Functionality} with.
     *                          - <b>id</b> - The Functionality identifier.
     *                          - <b>name</b> - The name of the functionality (used programmatically)
     *                          - <b>description</b> - Description of what this functionality means
     *                          - <b>dirty</b> - Whether the object has been modified since constructed.
     *                          - <b>deleted</b> - Indicates if this Functionality is deleted
     *                          - <b>created</b> - When the Functionality was created.
     *                          - <b>createdBy</b> - The User Id that created the Functionality
     *                          - <b>updated</b> - When the Functionality was updated.
     *                          - <b>updatedBy</b> - User Id that updated the Functionality
     *                          - <b>title</b> - A title that can be used to show the user
     */
    public function __construct($parameters = [])
    {
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
        if (isset($parameters['title'])) {
            $this->setTitle($parameters['title']);
        }
    }

    /**
     * Gets the id of the Functionality.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the Functionality.
     *
     * @param int $id
     *
     * @return Functionality
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the Functionality.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Functionality.
     *
     * @param string $name
     *
     * @return Functionality
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the description of the Functionality.
     * @return string	 */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the "description" of the Functionality.
     *
     * @param string $description
     *
     * @return Functionality
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Tells whether the Functionality is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the Functionality.
     *
     * @param bool $dirty
     *
     * @return Functionality
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Tells whether the Functionality is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the Functionality.
     *
     * @param bool $deleted
     *
     * @return Functionality
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the created of the Functionality.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the Functionality.
     *
     * @param DateTime $created
     *
     * @return Functionality
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
     * Gets the createdBy of the Functionality.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the Functionality.
     *
     * @param int $createdBy
     *
     * @return Functionality
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the Functionality.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the Functionality.
     *
     * @param DateTime $updated
     *
     * @return Functionality
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
     * Gets the updatedBy of the Functionality.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the Functionality.
     *
     * @param int $updatedBy
     *
     * @return Functionality
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Gets the title of the Functionality.
     * @return string	 */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the "title" of the Functionality.
     *
     * @param string $title
     *
     * @return Functionality
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
        if (null !== $this->title) {
            $json['title'] = $this->title;
        }

        return $json;
    }
}
