<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class MediaVersion implements \JsonSerializable
{
    /** @var int The Media identifier. */
    protected $mediaId;
    /** @var string The Media filename */
    protected $filename;
    /** @var DateTime When the Media was uploaded. A datetime string on the format ISO8601. */
    protected $uploaded;
    /** @var int The Media replacement Media identifier. Only set when the Media has been replaced, ie. versioning. */
    protected $replacedBy;
    /** @var string An optional comment about the version. */
    protected $comment;
    /** @var int The User identifier of the user who created the new version. */
    protected $userId;
    /** @var int The version number */
    protected $version;

    /**
     * Constructs a MediaVersion.
     *
     * @param array $parameters An array of parameters to initialize the {@link MediaVersion} with.
     *                          - <b>mediaId</b> - The Media identifier.
     *                          - <b>filename</b> - The Media filename
     *                          - <b>uploaded</b> - When the Media was uploaded. A datetime string on the format ISO8601.
     *                          - <b>replacedBy</b> - The Media replacement Media identifier. Only set when the Media has been replaced, ie. versioning.
     *                          - <b>comment</b> - An optional comment about the version.
     *                          - <b>userId</b> - The User identifier of the user who created the new version.
     *                          - <b>version</b> - The version number
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['mediaId'])) {
            $this->setMediaId($parameters['mediaId']);
        }
        if (isset($parameters['filename'])) {
            $this->setFilename($parameters['filename']);
        }
        if (isset($parameters['uploaded'])) {
            $this->setUploaded($parameters['uploaded']);
        }
        if (isset($parameters['replacedBy'])) {
            $this->setReplacedBy($parameters['replacedBy']);
        }
        if (isset($parameters['comment'])) {
            $this->setComment($parameters['comment']);
        }
        if (isset($parameters['userId'])) {
            $this->setUserId($parameters['userId']);
        }
        if (isset($parameters['version'])) {
            $this->setVersion($parameters['version']);
        }
    }

    /**
     * Gets the mediaId of the MediaVersion.
     * @return int	 */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * Sets the "mediaId" of the MediaVersion.
     *
     * @param int $mediaId
     *
     * @return MediaVersion
     */
    public function setMediaId($mediaId)
    {
        $this->mediaId = $mediaId;

        return $this;
    }

    /**
     * Gets the filename of the MediaVersion.
     * @return string	 */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Sets the "filename" of the MediaVersion.
     *
     * @param string $filename
     *
     * @return MediaVersion
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Gets the uploaded of the MediaVersion.
     * @return DateTime	 */
    public function getUploaded()
    {
        return $this->uploaded;
    }

    /**
     * Sets the "uploaded" of the MediaVersion.
     *
     * @param DateTime $uploaded
     *
     * @return MediaVersion
     */
    public function setUploaded($uploaded)
    {
        if ($uploaded instanceof DateTime) {
            $this->uploaded = $uploaded;
        } else {
            try {
                $this->uploaded = new DateTime($uploaded);
            } catch (\Exception $e) {
                $this->uploaded = null;
            }
        }

        return $this;
    }

    /**
     * Gets the replacedBy of the MediaVersion.
     * @return int	 */
    public function getReplacedBy()
    {
        return $this->replacedBy;
    }

    /**
     * Sets the "replacedBy" of the MediaVersion.
     *
     * @param int $replacedBy
     *
     * @return MediaVersion
     */
    public function setReplacedBy($replacedBy)
    {
        $this->replacedBy = $replacedBy;

        return $this;
    }

    /**
     * Gets the comment of the MediaVersion.
     * @return string	 */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the "comment" of the MediaVersion.
     *
     * @param string $comment
     *
     * @return MediaVersion
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Gets the userId of the MediaVersion.
     * @return int	 */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Sets the "userId" of the MediaVersion.
     *
     * @param int $userId
     *
     * @return MediaVersion
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Gets the version of the MediaVersion.
     * @return int	 */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the "version" of the MediaVersion.
     *
     * @param int $version
     *
     * @return MediaVersion
     */
    public function setVersion($version)
    {
        $this->version = $version;

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

        if (null !== $this->mediaId) {
            $json['mediaId'] = $this->mediaId;
        }
        if (null !== $this->filename) {
            $json['filename'] = $this->filename;
        }
        if (null !== $this->uploaded) {
            $json['uploaded'] = $this->uploaded->format(\DateTime::ATOM);
        }
        if (null !== $this->replacedBy) {
            $json['replacedBy'] = $this->replacedBy;
        }
        if (null !== $this->comment) {
            $json['comment'] = $this->comment;
        }
        if (null !== $this->userId) {
            $json['userId'] = $this->userId;
        }
        if (null !== $this->version) {
            $json['version'] = $this->version;
        }

        return $json;
    }
}
