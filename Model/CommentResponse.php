<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class CommentResponse extends Comment implements \JsonSerializable
{
    /** @var int Id of the comment */
    protected $id;
    /** @var int The QBank user that wrote this comment */
    protected $createdBy;
    /** @var DateTime Time this comment was made */
    protected $created;
    /** @var CommentResponse[] A array of eventual replies to this comment */
    protected $replies;

    /**
     * Constructs a CommentResponse.
     *
     * @param array $parameters An array of parameters to initialize the {@link CommentResponse} with.
     *                          - <b>id</b> - Id of the comment
     *                          - <b>createdBy</b> - The QBank user that wrote this comment
     *                          - <b>created</b> - Time this comment was made
     *                          - <b>replies</b> - A array of eventual replies to this comment
     */
    public function __construct($parameters = [])
    {
        parent::__construct($parameters);

        $this->replies = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['createdBy'])) {
            $this->setCreatedBy($parameters['createdBy']);
        }
        if (isset($parameters['created'])) {
            $this->setCreated($parameters['created']);
        }
        if (isset($parameters['replies'])) {
            $this->setReplies($parameters['replies']);
        }
    }

    /**
     * Gets the id of the CommentResponse.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the CommentResponse.
     *
     * @param int $id
     *
     * @return CommentResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the createdBy of the CommentResponse.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the CommentResponse.
     *
     * @param int $createdBy
     *
     * @return CommentResponse
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the created of the CommentResponse.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the CommentResponse.
     *
     * @param DateTime $created
     *
     * @return CommentResponse
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
     * Gets the replies of the CommentResponse.
     * @return CommentResponse[]	 */
    public function getReplies()
    {
        return $this->replies;
    }

    /**
     * Sets the "replies" of the CommentResponse.
     *
     * @param CommentResponse[] $replies
     *
     * @return CommentResponse
     */
    public function setReplies(array $replies)
    {
        $this->replies = [];

        foreach ($replies as $item) {
            $this->addCommentResponse($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Replies" of the CommentResponse.
     *
     * @param CommentResponse|array $item
     *
     * @return CommentResponse
     */
    public function addCommentResponse($item)
    {
        if (!($item instanceof self)) {
            if (is_array($item)) {
                try {
                    $item = new self($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate CommentResponse. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "CommentResponse"!', E_USER_WARNING);
            }
        }
        $this->replies[] = $item;

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
        if (null !== $this->createdBy) {
            $json['createdBy'] = $this->createdBy;
        }
        if (null !== $this->created) {
            $json['created'] = $this->created->format(\DateTime::ATOM);
        }
        if (null !== $this->replies && !empty($this->replies)) {
            $json['replies'] = $this->replies;
        }

        return $json;
    }
}
