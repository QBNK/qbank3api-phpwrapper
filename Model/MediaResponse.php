<?php

namespace QBNK\QBank\API\Model;

use DateTime;
use QBNK\QBank\API\Exception\NotFoundException;
use QBNK\QBank\API\Exception\PropertyNotFoundException;

class MediaResponse extends Media implements \JsonSerializable
{
    const TEMPLATE_IMAGE = 'image';
    const TEMPLATE_VIDEO = 'video';
    const TEMPLATE_AUDIO = 'audio';
    const TEMPLATE_FONT = 'font';
    const TEMPLATE_DOCUMENT = 'document';

    /** @var int The Media identifier. */
    protected $mediaId;
    /** @var int Indicates if this Media has a thumbnail, preview and/or if they have been changed. This is a bit field, with the following values currently in use; Has thumbnail = 0b00000001; Has preview = 0b00000010; Thumbnail changed = 0b00000100; Preview changed = 0b00001000; */
    protected $thumbPreviewStatus;
    /** @var string The Media's filename extension. */
    protected $extension;
    /** @var MetaData[] The MetaData extracted from the Media file. */
    protected $metadata;
    /** @var MimeType The Media MimeType. */
    protected $mimetype;
    /** @var int The Media size in bytes. */
    protected $size;
    /** @var int The Media status identifier. */
    protected $statusId;
    /** @var DateTime When the Media was uploaded. A datetime string on the format ISO8601. */
    protected $uploaded;
    /** @var int The identifier of the User who uploaded the Media. */
    protected $uploadedBy;
    /** @var DeploymentFile[] An array of deployed files */
    protected $deployedFiles;
    /** @var int Number of comments made on this media */
    protected $commentCount;
    /** @var int The rating for this media */
    protected $rating;
    /** @var self[] An array of Media */
    protected $childMedias;
    /** @var int The base Object identifier. */
    protected $objectId;
    /** @var DateTime When the Object was created. */
    protected $created;
    /** @var int The identifier of the User who created the Object. */
    protected $createdBy;
    /** @var DateTime When the Object was updated. */
    protected $updated;
    /** @var int Which user that updated the Object. */
    protected $updatedBy;
    /** @var bool Whether the object has been modified since constructed. */
    protected $dirty;
    /** @var PropertySet[] The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties. */
    protected $propertySets;
    /** @var int The discriminator id of the extending class */
    protected $discriminatorId;

    /**
     * Constructs a MediaResponse.
     *
     * @param array $parameters An array of parameters to initialize the {@link MediaResponse} with.
     *                          - <b>mediaId</b> - The Media identifier.
     *                          - <b>thumbPreviewStatus</b> - Indicates if this Media has a thumbnail, preview and/or if they have been changed. This is a bit field, with the following values currently in use; Has thumbnail = 0b00000001; Has preview = 0b00000010; Thumbnail changed = 0b00000100; Preview changed = 0b00001000;
     *                          - <b>extension</b> - The Media's filename extension.
     *                          - <b>metadata</b> - The MetaData extracted from the Media file.
     *                          - <b>mimetype</b> - The Media MimeType.
     *                          - <b>size</b> - The Media size in bytes.
     *                          - <b>statusId</b> - The Media status identifier.
     *                          - <b>uploaded</b> - When the Media was uploaded. A datetime string on the format ISO8601.
     *                          - <b>uploadedBy</b> - The identifier of the User who uploaded the Media.
     *                          - <b>deployedFiles</b> - An array of deployed files
     *                          - <b>commentCount</b> - Number of comments made on this media
     *                          - <b>rating</b> - The rating for this media
     *                          - <b>childMedias</b> - An array of Media
     *                          - <b>objectId</b> - The base Object identifier.
     *                          - <b>created</b> - When the Object was created.
     *                          - <b>createdBy</b> - The identifier of the User who created the Object.
     *                          - <b>updated</b> - When the Object was updated.
     *                          - <b>updatedBy</b> - Which user that updated the Object.
     *                          - <b>dirty</b> - Whether the object has been modified since constructed.
     *                          - <b>propertySets</b> - The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     *                          - <b>discriminatorId</b> - The discriminator id of the extending class
     */
    public function __construct($parameters = [])
    {
        parent::__construct($parameters);

        $this->metadata = [];
        $this->deployedFiles = [];
        $this->childMedias = [];
        $this->propertySets = [];

        if (isset($parameters['mediaId'])) {
            $this->setMediaId($parameters['mediaId']);
        }
        if (isset($parameters['thumbPreviewStatus'])) {
            $this->setThumbPreviewStatus($parameters['thumbPreviewStatus']);
        }
        if (isset($parameters['extension'])) {
            $this->setExtension($parameters['extension']);
        }
        if (isset($parameters['metadata'])) {
            $this->setMetadata($parameters['metadata']);
        }
        if (isset($parameters['mimetype'])) {
            $this->setMimetype($parameters['mimetype']);
        }
        if (isset($parameters['size'])) {
            $this->setSize($parameters['size']);
        }
        if (isset($parameters['statusId'])) {
            $this->setStatusId($parameters['statusId']);
        }
        if (isset($parameters['uploaded'])) {
            $this->setUploaded($parameters['uploaded']);
        }
        if (isset($parameters['uploadedBy'])) {
            $this->setUploadedBy($parameters['uploadedBy']);
        }
        if (isset($parameters['deployedFiles'])) {
            $this->setDeployedFiles($parameters['deployedFiles']);
        }
        if (isset($parameters['commentCount'])) {
            $this->setCommentCount($parameters['commentCount']);
        }
        if (isset($parameters['rating'])) {
            $this->setRating($parameters['rating']);
        }
        if (isset($parameters['childMedias'])) {
            $this->setChildMedias($parameters['childMedias']);
        }
        if (isset($parameters['objectId'])) {
            $this->setObjectId($parameters['objectId']);
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
        if (isset($parameters['dirty'])) {
            $this->setDirty($parameters['dirty']);
        }
        if (isset($parameters['propertySets'])) {
            $this->setPropertySets($parameters['propertySets']);
        }
        if (isset($parameters['discriminatorId'])) {
            $this->setDiscriminatorId($parameters['discriminatorId']);
        }
    }

    /**
     * Gets the mediaId of the MediaResponse.
     * @return int	 */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * Sets the "mediaId" of the MediaResponse.
     *
     * @param int $mediaId
     *
     * @return MediaResponse
     */
    public function setMediaId($mediaId)
    {
        $this->mediaId = $mediaId;

        return $this;
    }

    /**
     * Gets the thumbPreviewStatus of the MediaResponse.
     * @return int	 */
    public function getThumbPreviewStatus()
    {
        return $this->thumbPreviewStatus;
    }

    /**
     * Sets the "thumbPreviewStatus" of the MediaResponse.
     *
     * @param int $thumbPreviewStatus
     *
     * @return MediaResponse
     */
    public function setThumbPreviewStatus($thumbPreviewStatus)
    {
        $this->thumbPreviewStatus = $thumbPreviewStatus;

        return $this;
    }

    /**
     * Gets the extension of the MediaResponse.
     * @return string	 */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Sets the "extension" of the MediaResponse.
     *
     * @param string $extension
     *
     * @return MediaResponse
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Sets the "metadata" of the MediaResponse.
     *
     * @param MetaData[] $metadata
     *
     * @return MediaResponse
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = [];

        foreach ($metadata as $item) {
            $this->addMetaData($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Metadata" of the MediaResponse.
     *
     * @param MetaData|array $item
     *
     * @return MediaResponse
     */
    public function addMetaData($item)
    {
        if (!($item instanceof MetaData)) {
            if (is_array($item)) {
                try {
                    $item = new MetaData($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate MetaData. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "MetaData"!', E_USER_WARNING);
            }
        }
        $this->metadata[] = $item;

        return $this;
    }

    /**
     * Gets the mimetype of the MediaResponse.
     * @return MimeType	 */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Sets the "mimetype" of the MediaResponse.
     *
     * @param MimeType $mimetype
     *
     * @return MediaResponse
     */
    public function setMimetype($mimetype)
    {
        if ($mimetype instanceof MimeType) {
            $this->mimetype = $mimetype;
        } elseif (is_array($mimetype)) {
            $this->mimetype = new MimeType($mimetype);
        } else {
            $this->mimetype = null;
            trigger_error('Argument must be an object of class MimeType. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the size of the MediaResponse.
     * @return int	 */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Sets the "size" of the MediaResponse.
     *
     * @param int $size
     *
     * @return MediaResponse
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Gets the statusId of the MediaResponse.
     * @return int	 */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * Sets the "statusId" of the MediaResponse.
     *
     * @param int $statusId
     *
     * @return MediaResponse
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * Gets the uploaded of the MediaResponse.
     * @return DateTime	 */
    public function getUploaded()
    {
        return $this->uploaded;
    }

    /**
     * Sets the "uploaded" of the MediaResponse.
     *
     * @param DateTime $uploaded
     *
     * @return MediaResponse
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
     * Gets the uploadedBy of the MediaResponse.
     * @return int	 */
    public function getUploadedBy()
    {
        return $this->uploadedBy;
    }

    /**
     * Sets the "uploadedBy" of the MediaResponse.
     *
     * @param int $uploadedBy
     *
     * @return MediaResponse
     */
    public function setUploadedBy($uploadedBy)
    {
        $this->uploadedBy = $uploadedBy;

        return $this;
    }

    /**
     * Gets the deployedFiles of the MediaResponse.
     * @return DeploymentFile[]	 */
    public function getDeployedFiles()
    {
        return $this->deployedFiles;
    }

    /**
     * Sets the "deployedFiles" of the MediaResponse.
     *
     * @param DeploymentFile[] $deployedFiles
     *
     * @return MediaResponse
     */
    public function setDeployedFiles(array $deployedFiles)
    {
        $this->deployedFiles = [];

        foreach ($deployedFiles as $item) {
            $this->addDeploymentFile($item);
        }

        return $this;
    }

    /**
     * Adds an object of "DeployedFiles" of the MediaResponse.
     *
     * @param DeploymentFile|array $item
     *
     * @return MediaResponse
     */
    public function addDeploymentFile($item)
    {
        if (!($item instanceof DeploymentFile)) {
            if (is_array($item)) {
                try {
                    $item = new DeploymentFile($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate DeploymentFile. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "DeploymentFile"!', E_USER_WARNING);
            }
        }
        $this->deployedFiles[] = $item;

        return $this;
    }

    /**
     * Gets the commentCount of the MediaResponse.
     * @return int	 */
    public function getCommentCount()
    {
        return $this->commentCount;
    }

    /**
     * Sets the "commentCount" of the MediaResponse.
     *
     * @param int $commentCount
     *
     * @return MediaResponse
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;

        return $this;
    }

    /**
     * Gets the rating of the MediaResponse.
     * @return int	 */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Sets the "rating" of the MediaResponse.
     *
     * @param int $rating
     *
     * @return MediaResponse
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Gets the childMedias of the MediaResponse.
     * @return self[]	 */
    public function getChildMedias()
    {
        return $this->childMedias;
    }

    /**
     * Sets the "childMedias" of the MediaResponse.
     *
     * @param self[] $childMedias
     *
     * @return MediaResponse
     */
    public function setChildMedias(array $childMedias)
    {
        $this->childMedias = [];

        foreach ($childMedias as $item) {
            $this->addself($item);
        }

        return $this;
    }

    /**
     * Adds an object of "ChildMedias" of the MediaResponse.
     *
     * @param self|array $item
     *
     * @return MediaResponse
     */
    public function addself($item)
    {
        if (!($item instanceof self)) {
            if (is_array($item)) {
                try {
                    $item = new self($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate self. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "self"!', E_USER_WARNING);
            }
        }
        $this->childMedias[] = $item;

        return $this;
    }

    /**
     * Gets the objectId of the MediaResponse.
     * @return int	 */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Sets the "objectId" of the MediaResponse.
     *
     * @param int $objectId
     *
     * @return MediaResponse
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Gets the created of the MediaResponse.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the MediaResponse.
     *
     * @param DateTime $created
     *
     * @return MediaResponse
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
     * Gets the createdBy of the MediaResponse.
     * @return int	 */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets the "createdBy" of the MediaResponse.
     *
     * @param int $createdBy
     *
     * @return MediaResponse
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Gets the updated of the MediaResponse.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the MediaResponse.
     *
     * @param DateTime $updated
     *
     * @return MediaResponse
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
     * Gets the updatedBy of the MediaResponse.
     * @return int	 */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Sets the "updatedBy" of the MediaResponse.
     *
     * @param int $updatedBy
     *
     * @return MediaResponse
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Tells whether the MediaResponse is dirty.
     * @return bool	 */
    public function isDirty()
    {
        return $this->dirty;
    }

    /**
     * Sets the "dirty" of the MediaResponse.
     *
     * @param bool $dirty
     *
     * @return MediaResponse
     */
    public function setDirty($dirty)
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * Gets the propertySets of the MediaResponse.
     * @return PropertySet[]	 */
    public function getPropertySets()
    {
        return $this->propertySets;
    }

    /**
     * Gets a property from the first available PropertySet.
     *
     * @param string $systemName the system name of the property to get
     *
     * @throws PropertyNotFoundException thrown if the requested property does not exist
     *
     * @return PropertyResponse
     */
    public function getProperty($systemName)
    {
        foreach ($this->propertySets as $propertySet) {
            /** @var PropertySet $propertySet */
            foreach ($propertySet->getProperties() as $property) {
                if ($property->getPropertyType()->getSystemName() == $systemName) {
                    return $property;
                }
            }
        }
        throw new PropertyNotFoundException('No Property with the system name "' . $systemName . '" exists.');
    }

    /**
     * Sets the "propertySets" of the MediaResponse.
     *
     * @param PropertySet[] $propertySets
     *
     * @return MediaResponse
     */
    public function setPropertySets(array $propertySets)
    {
        $this->propertySets = [];

        foreach ($propertySets as $item) {
            $this->addPropertySet($item);
        }

        return $this;
    }

    /**
     * Adds an object of "PropertySets" of the MediaResponse.
     *
     * @param PropertySet|array $item
     *
     * @return MediaResponse
     */
    public function addPropertySet($item)
    {
        if (!($item instanceof PropertySet)) {
            if (is_array($item)) {
                try {
                    $item = new PropertySet($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate PropertySet. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "PropertySet"!', E_USER_WARNING);
            }
        }
        $this->propertySets[] = $item;

        return $this;
    }

    /**
     * Gets the discriminatorId of the MediaResponse.
     * @return int	 */
    public function getDiscriminatorId()
    {
        return $this->discriminatorId;
    }

    /**
     * Sets the "discriminatorId" of the MediaResponse.
     *
     * @param int $discriminatorId
     *
     * @return MediaResponse
     */
    public function setDiscriminatorId($discriminatorId)
    {
        $this->discriminatorId = $discriminatorId;

        return $this;
    }

    /**
     * Checks if media is grouped.
     *
     * @return bool
     */
    public function isGrouped()
    {
        return !is_null($this->parentId);
    }

    /**
     * Checks if media is a parent to another media.
     *
     * @return bool
     */
    public function isParent()
    {
        return $this->parentId === $this->mediaId;
    }

    /**
     * Checks if media is child to another media.
     *
     * @return bool
     */
    public function isChild()
    {
        return !is_null($this->parentId) && $this->parentId !== $this->mediaId;
    }

    /**
     * Gets a DeployedFile.
     *
     * @param int|null $templateId   The id of the template to get. Null for the original file.
     * @param string   $templateType the type of template
     * @param int      $siteId       The DeploymentSite id to get the template for. If not supplied, first available will be used.
     *
     * @throws NotFoundException thrown if the requested deployed file does not exist
     *
     * @return DeploymentFile
     */
    public function getDeployedFile($templateId, $templateType = self::TEMPLATE_IMAGE, $siteId = null)
    {
        /** @var DeploymentFile $deployedFile */
        foreach ($this->deployedFiles as $deployedFile) {
            if (null === $siteId || $siteId == $deployedFile->getDeploymentSiteId()) {
                if (null === $templateId
                    && null === $deployedFile->getImageTemplateId()
                    && null === $deployedFile->getVideoTemplateId()
                    && null === $deployedFile->getAudioTemplateId()
                    && null === $deployedFile->getDocumentTemplateId()
                    && null === $deployedFile->getFontTemplateId()) {
                    return $deployedFile;
                }

                switch ($templateType) {
                case self::TEMPLATE_IMAGE:
                    if ($templateId == $deployedFile->getImageTemplateId()
                            && null === $deployedFile->getVideoTemplateId()
                            && null === $deployedFile->getAudioTemplateId()
                            && null === $deployedFile->getDocumentTemplateId()
                            && null === $deployedFile->getFontTemplateId()) {
                        return $deployedFile;
                    }

                break;

                case self::TEMPLATE_VIDEO:
                    if ($templateId == $deployedFile->getVideoTemplateId()
                            && null === $deployedFile->getImageTemplateId()
                            && null === $deployedFile->getAudioTemplateId()
                            && null === $deployedFile->getDocumentTemplateId()
                            && null === $deployedFile->getFontTemplateId()) {
                        return $deployedFile;
                    }

                break;

                case self::TEMPLATE_AUDIO:
                    if ($templateId == $deployedFile->getAudioTemplateId()
                            && null === $deployedFile->getImageTemplateId()
                            && null === $deployedFile->getVideoTemplateId()
                            && null === $deployedFile->getDocumentTemplateId()
                            && null === $deployedFile->getFontTemplateId()) {
                        return $deployedFile;
                    }

                break;

                case self::TEMPLATE_DOCUMENT:
                    if ($templateId == $deployedFile->getDocumentTemplateId()
                            && null === $deployedFile->getImageTemplateId()
                            && null === $deployedFile->getVideoTemplateId()
                            && null === $deployedFile->getAudioTemplateId()
                            && null === $deployedFile->getFontTemplateId()) {
                        return $deployedFile;
                    }

                break;

                case self::TEMPLATE_FONT:
                    if ($templateId == $deployedFile->getFontTemplateId()
                            && null === $deployedFile->getImageTemplateId()
                            && null === $deployedFile->getVideoTemplateId()
                            && null === $deployedFile->getAudioTemplateId()
                            && null === $deployedFile->getDocumentTemplateId()) {
                        return $deployedFile;
                    }

                break;

                default:
                // Do nothing

                break;
                }
            }
        }

        throw new NotFoundException('No DeploymentFile with the id "' . $templateId . '" exists.');
    }

    /**
     * Gets MetaData.
     *
     * @param string $section The Metadata section to get. Eg. "Exif", "IPTC", etc.
     * @param string $key     The Metadata key to get. Eg. "width", "shutterspeed", etc.
     *
     * @throws NotFoundException thrown if the requested Metadata does not exist
     *
     * @return MetaData[]|MetaData|string The requested metadata
     */
    public function getMetadata($section = null, $key = null)
    {
        if (null === $section) {
            return $this->metadata;
        }
        foreach ($this->metadata as $md) {
            /** @var MetaData $md */
            if ($section != $md->getSection()) {
                continue;
            }
            if (null === $key) {
                return $md;
            }
            foreach ($md->getData() as $k => $data) {
                if ($key == $k) {
                    return $data;
                }
            }
            throw new NotFoundException('No metadata with section "' . $section . '" and key "' . $key . '" exists.');
        }
        throw new NotFoundException('No metadata with section "' . $section . '" exists.');
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array an associative array of the available variables
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        if (null !== $this->mediaId) {
            $json['mediaId'] = $this->mediaId;
        }
        if (null !== $this->thumbPreviewStatus) {
            $json['thumbPreviewStatus'] = $this->thumbPreviewStatus;
        }
        if (null !== $this->extension) {
            $json['extension'] = $this->extension;
        }
        if (null !== $this->metadata && !empty($this->metadata)) {
            $json['metadata'] = $this->metadata;
        }
        if (null !== $this->mimetype) {
            $json['mimetype'] = $this->mimetype;
        }
        if (null !== $this->size) {
            $json['size'] = $this->size;
        }
        if (null !== $this->statusId) {
            $json['statusId'] = $this->statusId;
        }
        if (null !== $this->uploaded) {
            $json['uploaded'] = $this->uploaded->format(\DateTime::ATOM);
        }
        if (null !== $this->uploadedBy) {
            $json['uploadedBy'] = $this->uploadedBy;
        }
        if (null !== $this->deployedFiles && !empty($this->deployedFiles)) {
            $json['deployedFiles'] = $this->deployedFiles;
        }
        if (null !== $this->commentCount) {
            $json['commentCount'] = $this->commentCount;
        }
        if (null !== $this->rating) {
            $json['rating'] = $this->rating;
        }
        if (null !== $this->childMedias && !empty($this->childMedias)) {
            $json['childMedias'] = $this->childMedias;
        }
        if (null !== $this->objectId) {
            $json['objectId'] = $this->objectId;
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
        if (null !== $this->dirty) {
            $json['dirty'] = $this->dirty;
        }
        if (null !== $this->propertySets && !empty($this->propertySets)) {
            $json['propertySets'] = $this->propertySets;
        }
        if (null !== $this->discriminatorId) {
            $json['discriminatorId'] = $this->discriminatorId;
        }

        foreach ($this->propertySets as $propertySet) {
            /** @var PropertySet $propertySet */
            foreach ($propertySet->getProperties() as $property) {
                /** @var Property $property */
                if (!isset($json['properties'][$property->getPropertyType()->getSystemName()])) {
                    if ($property->getValue() instanceof \DateTime) {
                        $json['properties'][$property->getPropertyType()->getSystemName()] = $property->getValue()->format(\DateTime::ATOM);
                    } else {
                        $json['properties'][$property->getPropertyType()->getSystemName()] = $property->getValue();
                    }
                }
            }
        }

        return $json;
    }
}
