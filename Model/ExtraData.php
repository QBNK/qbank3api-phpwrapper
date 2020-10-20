<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class ExtraData implements \JsonSerializable
{
    /** @var int The ExtraData identifier. */
    protected $id;
    /** @var bool Whether the object has been modified since constructed. */
    protected $dirty;
    /** @var bool Indicates if this ExtraData is deleted */
    protected $deleted;
    /** @var DateTime When the ExtraData was created. */
    protected $created;
    /** @var int The User Id that created the ExtraData */
    protected $createdBy;
    /** @var DateTime When the ExtraData was updated. */
    protected $updated;
    /** @var int User Id that updated the ExtraData */
    protected $updatedBy;
    /** @var string The ExtraData key */
    protected $key;
    /** @var int The ExtraData Key Identifier */
    protected $keyId;
    /** @var string The value of the ExtraData */
    protected $value;

    /**
     * Constructs a ExtraData.
     *
     * @param array $parameters An array of parameters to initialize the {@link ExtraData} with.
     *                          - <b>id</b> - The ExtraData identifier.
     *                          - <b>dirty</b> - Whether the object has been modified since constructed.
     *                          - <b>deleted</b> - Indicates if this ExtraData is deleted
     *                          - <b>created</b> - When the ExtraData was created.
     *                          - <b>createdBy</b> - The User Id that created the ExtraData
     *                          - <b>updated</b> - When the ExtraData was updated.
     *                          - <b>updatedBy</b> - User Id that updated the ExtraData
     *                          - <b>key</b> - The ExtraData key
     *                          - <b>keyId</b> - The ExtraData Key Identifier
     *                          - <b>value</b> - The value of the ExtraData
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
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
        if (isset($parameters['key'])) {
            $this->setKey($parameters['key']);
        }
        if (isset($parameters['keyId'])) {
            $this->setKeyId($parameters['keyId']);
        }
        if (isset($parameters['value'])) {
            $this->setValue($parameters['value']);
        }
    }

    /**
     * Gets the id of the ExtraData.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the ExtraData.
     *
     * @param int $id
     *
     * @return ExtraData
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Tells whether the ExtraData is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the ExtraData.
     *
     * @param bool $dirty
     *
     * @return ExtraData
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Tells whether the ExtraData is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the ExtraData.
     *
     * @param bool $deleted
     *
     * @return ExtraData
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the created of the ExtraData.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the ExtraData.
     *
     * @param DateTime $created
     *
     * @return ExtraData
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
     * Gets the createdBy of the ExtraData.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the ExtraData.
     *
     * @param int $createdBy
     *
     * @return ExtraData
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the ExtraData.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the ExtraData.
     *
     * @param DateTime $updated
     *
     * @return ExtraData
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
     * Gets the updatedBy of the ExtraData.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the ExtraData.
     *
     * @param int $updatedBy
     *
     * @return ExtraData
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Gets the key of the ExtraData.
     * @return string	 */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Sets the "key" of the ExtraData.
     *
     * @param string $key
     *
     * @return ExtraData
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Gets the keyId of the ExtraData.
     * @return int	 */
    public function getKeyId()
    {
        return $this->keyId;
    }

    /**
     * Sets the "keyId" of the ExtraData.
     *
     * @param int $keyId
     *
     * @return ExtraData
     */
    public function setKeyId($keyId)
    {
        $this->keyId = $keyId;

        return $this;
    }

    /**
     * Gets the value of the ExtraData.
     * @return string	 */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the "value" of the ExtraData.
     *
     * @param string $value
     *
     * @return ExtraData
     */
    public function setValue($value)
    {
        $this->value = $value;

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
        if (null !== $this->key) {
            $json['key'] = $this->key;
        }
        if (null !== $this->keyId) {
            $json['keyId'] = $this->keyId;
        }
        if (null !== $this->value) {
            $json['value'] = $this->value;
        }

        return $json;
    }
}
