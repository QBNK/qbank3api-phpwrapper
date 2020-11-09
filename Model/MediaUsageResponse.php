<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class MediaUsageResponse extends MediaUsage implements \JsonSerializable
{
    /** @var int */
    protected $id;
    /** @var DateTime */
    protected $created;
    /** @var DateTime */
    protected $deleted;
    /** @var int */
    protected $updatedBy;

    /**
     * Constructs a MediaUsageResponse.
     *
     * @param array $parameters An array of parameters to initialize the {@link MediaUsageResponse} with.
     *                          - <b>id</b> -
     *                          - <b>created</b> -
     *                          - <b>deleted</b> -
     *                          - <b>updatedBy</b> -
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
        if (isset($parameters['deleted'])) {
            $this->setDeleted($parameters['deleted']);
        }
        if (isset($parameters['updatedBy'])) {
            $this->setUpdatedBy($parameters['updatedBy']);
        }
    }

    /**
     * Gets the id of the MediaUsageResponse.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the MediaUsageResponse.
     *
     * @param int $id
     *
     * @return MediaUsageResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the created of the MediaUsageResponse.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the MediaUsageResponse.
     *
     * @param DateTime $created
     *
     * @return MediaUsageResponse
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
     * Gets the deleted of the MediaUsageResponse.
     * @return DateTime	 */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the MediaUsageResponse.
     *
     * @param DateTime $deleted
     *
     * @return MediaUsageResponse
     */
    public function setDeleted($deleted)
    {
        if ($deleted instanceof DateTime) {
            $this->deleted = $deleted;
        } else {
            try {
                $this->deleted = new DateTime($deleted);
            } catch (\Exception $e) {
                $this->deleted = null;
            }
        }

        return $this;
    }

    /**
     * Gets the updatedBy of the MediaUsageResponse.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the MediaUsageResponse.
     *
     * @param int $updatedBy
     *
     * @return MediaUsageResponse
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

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
        if (null !== $this->deleted) {
            $json['deleted'] = $this->deleted->format(\DateTime::ATOM);
        }
        if (null !== $this->updatedBy) {
            $json['updatedBy'] = $this->updatedBy;
        }

        return $json;
    }
}
