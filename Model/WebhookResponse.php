<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class WebhookResponse extends Webhook implements \JsonSerializable
{
    /** @var int */
    protected $id;
    /** @var DateTime */
    protected $created;
    /** @var int */
    protected $createdBy;
    /** @var DateTime */
    protected $updated;
    /** @var int */
    protected $updatedBy;
    /** @var bool */
    protected $deleted;

    /**
     * Constructs a WebhookResponse.
     *
     * @param array $parameters An array of parameters to initialize the {@link WebhookResponse} with.
     *                          - <b>id</b> -
     *                          - <b>created</b> -
     *                          - <b>createdBy</b> -
     *                          - <b>updated</b> -
     *                          - <b>updatedBy</b> -
     *                          - <b>deleted</b> -
     */
    public function __construct($parameters = [])
    {
        parent::__construct($parameters);

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
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
        if (isset($parameters['deleted'])) {
            $this->setDeleted($parameters['deleted']);
        }
    }

    /**
     * Gets the id of the WebhookResponse.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the WebhookResponse.
     *
     * @param int $id
     *
     * @return WebhookResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the created of the WebhookResponse.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the WebhookResponse.
     *
     * @param DateTime $created
     *
     * @return WebhookResponse
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
     * Gets the createdBy of the WebhookResponse.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the WebhookResponse.
     *
     * @param int $createdBy
     *
     * @return WebhookResponse
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the WebhookResponse.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the WebhookResponse.
     *
     * @param DateTime $updated
     *
     * @return WebhookResponse
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
     * Gets the updatedBy of the WebhookResponse.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the WebhookResponse.
     *
     * @param int $updatedBy
     *
     * @return WebhookResponse
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Tells whether the WebhookResponse is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the WebhookResponse.
     *
     * @param bool $deleted
     *
     * @return WebhookResponse
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array an associative array of the available variables
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        if (null !== $this->id) {
            $json['id'] = $this->id;
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
        if (null !== $this->deleted) {
            $json['deleted'] = $this->deleted;
        }

        return $json;
    }
}
