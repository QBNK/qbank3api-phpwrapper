<?php

namespace QBNK\QBank\API\Model;

class Comment implements \JsonSerializable
{
    /** @var int Object that this comment is made on */
    protected $objectId;
    /** @var string The actual comment */
    protected $comment;
    /** @var int If a reply, indicates this comments parent */
    protected $parentId;
    /** @var string Set only if a anonymous user wrote this comment, see createdBy otherwise */
    protected $userName;
    /** @var string Set only if a anonymous user wrote this comment, see createdBy otherwise */
    protected $userEmail;

    /**
     * Constructs a Comment.
     *
     * @param array $parameters An array of parameters to initialize the {@link Comment} with.
     *                          - <b>objectId</b> - Object that this comment is made on
     *                          - <b>comment</b> - The actual comment
     *                          - <b>parentId</b> - If a reply, indicates this comments parent
     *                          - <b>userName</b> - Set only if a anonymous user wrote this comment, see createdBy otherwise
     *                          - <b>userEmail</b> - Set only if a anonymous user wrote this comment, see createdBy otherwise
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['objectId'])) {
            $this->setObjectId($parameters['objectId']);
        }
        if (isset($parameters['comment'])) {
            $this->setComment($parameters['comment']);
        }
        if (isset($parameters['parentId'])) {
            $this->setParentId($parameters['parentId']);
        }
        if (isset($parameters['userName'])) {
            $this->setUserName($parameters['userName']);
        }
        if (isset($parameters['userEmail'])) {
            $this->setUserEmail($parameters['userEmail']);
        }
    }

    /**
     * Gets the objectId of the Comment.
     * @return int	 */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Sets the "objectId" of the Comment.
     *
     * @param int $objectId
     *
     * @return Comment
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Gets the comment of the Comment.
     * @return string	 */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the "comment" of the Comment.
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Gets the parentId of the Comment.
     * @return int	 */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Sets the "parentId" of the Comment.
     *
     * @param int $parentId
     *
     * @return Comment
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Gets the userName of the Comment.
     * @return string	 */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Sets the "userName" of the Comment.
     *
     * @param string $userName
     *
     * @return Comment
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Gets the userEmail of the Comment.
     * @return string	 */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Sets the "userEmail" of the Comment.
     *
     * @param string $userEmail
     *
     * @return Comment
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

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

        if (null !== $this->objectId) {
            $json['objectId'] = $this->objectId;
        }
        if (null !== $this->comment) {
            $json['comment'] = $this->comment;
        }
        if (null !== $this->parentId) {
            $json['parentId'] = $this->parentId;
        }
        if (null !== $this->userName) {
            $json['userName'] = $this->userName;
        }
        if (null !== $this->userEmail) {
            $json['userEmail'] = $this->userEmail;
        }

        return $json;
    }
}
