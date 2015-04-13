<?php

namespace QBNK\QBank\API\Model;

use DateTime;
use QBNK\QBank\API\Exception\NotFoundException;
use QBNK\QBank\API\Exception\PropertyNotFoundException;

class MediaResponse extends Media implements \JsonSerializable
{
    const TEMPLATE_IMAGE = 'image';
    const TEMPLATE_VIDEO = 'video';

    /**
     * The Media identifier.
     * @val int	 */
    protected $mediaId;
    /**
     * Indicates if this Media has a thumbnail, preview and/or if they have been changed. This is a bit field, with the following values currently in use; Has thumbnail = 0b00000001; Has preview = 0b00000010; Thumbnail changed = 0b00000100; Preview changed = 0b00001000;.
     * @val int	 */
    protected $thumbPreviewStatus;
    /**
     * The Media's filename extension.
     * @val string	 */
    protected $extension;
    /**
     * The MetaData extracted from the Media file.
     * @val MetaData[]	 */
    protected $metadata;
    /**
     * The Media MimeType.
     * @val MimeType	 */
    protected $mimetype;
    /**
     * The Media size in bytes.
     * @val int	 */
    protected $size;
    /**
     * The Media status identifier.
     * @val int	 */
    protected $statusId;
    /**
     * When the Media was uploaded. A datetime string on the format ISO8601.
     * @val string	 */
    protected $uploaded;
    /**
     * The identifier of the User who uploaded the Media.
     * @val int	 */
    protected $uploadedBy;
    /**
     * An array of deployed files.
     * @val DeploymentFile[]	 */
    protected $deployedFiles;
    /**
     * The base Object identifier.
     * @val int	 */
    protected $objectId;
    /**
     * When the Object was created.
     * @val DateTime	 */
    protected $created;
    /**
     * The identifier of the User who created the Object.
     * @val int	 */
    protected $createdBy;
    /**
     * When the Object was updated.
     * @val DateTime	 */
    protected $updated;
    /**
     * Which user that updated the Object.
     * @val int	 */
    protected $updatedBy;
    /**
     * Whether the object has been modified since constructed.
     * @val bool	 */
    protected $dirty;
    /**
     * The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     * @val PropertySet[]	 */
    protected $propertySets;

    /**
     * Constructs a MediaResponse.
     *
     * @param array $parameters An array of parameters to initialize the { @link MediaResponse } with.
     * - <b>mediaId</b> - The Media identifier.
     * - <b>thumbPreviewStatus</b> - Indicates if this Media has a thumbnail, preview and/or if they have been changed. This is a bit field, with the following values currently in use; Has thumbnail = 0b00000001; Has preview = 0b00000010; Thumbnail changed = 0b00000100; Preview changed = 0b00001000;
     * - <b>extension</b> - The Media's filename extension.
     * - <b>metadata</b> - The MetaData extracted from the Media file.
     * - <b>mimetype</b> - The Media MimeType.
     * - <b>size</b> - The Media size in bytes.
     * - <b>statusId</b> - The Media status identifier.
     * - <b>uploaded</b> - When the Media was uploaded. A datetime string on the format ISO8601.
     * - <b>uploadedBy</b> - The identifier of the User who uploaded the Media.
     * - <b>deployedFiles</b> - An array of deployed files
     * - <b>objectId</b> - The base Object identifier.
     * - <b>created</b> - When the Object was created.
     * - <b>createdBy</b> - The identifier of the User who created the Object.
     * - <b>updated</b> - When the Object was updated.
     * - <b>updatedBy</b> - Which user that updated the Object.
     * - <b>dirty</b> - Whether the object has been modified since constructed.
     * - <b>propertySets</b> - The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     */
    public function __construct($parameters = [])
    {
        parent::__construct($parameters);

        $this->metadata      = [];
        $this->deployedFiles = [];
        $this->propertySets  = [];

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
        $this->mediaId =  $mediaId;

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
        $this->thumbPreviewStatus =  $thumbPreviewStatus;

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
        $this->extension =  $extension;

        return $this;
    }

    /**
     * Sets the "metadata" of the MediaResponse.
     *
     * @param MetaData[] $metadata
     *
     * @return MediaResponse
     */
    public function setMetadata($metadata)
    {
        if (is_array($metadata)) {
            $this->metadata = [];
            foreach ($metadata as $item) {
                if (!($item instanceof MetaData)) {
                    if (is_array($item)) {
                        try {
                            $item = new MetaData($item);
                        } catch (\Exception $e) {
                            trigger_error('Could not auto-instantiate MetaData. '.$e->getMessage(), E_USER_WARNING);
                        }
                    } else {
                        trigger_error('Array parameter item is not of expected type "MetaData"!', E_USER_WARNING);
                        continue;
                    }
                }
                $this->metadata[] = $item;
            }
        }

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
        $this->size =  $size;

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
        $this->statusId =  $statusId;

        return $this;
    }
    /**
     * Gets the uploaded of the MediaResponse.
     * @return string	 */
    public function getUploaded()
    {
        return $this->uploaded;
    }

    /**
     * Sets the "uploaded" of the MediaResponse.
     *
     * @param string $uploaded
     *
     * @return MediaResponse
     */
    public function setUploaded($uploaded)
    {
        $this->uploaded =  $uploaded;

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
        $this->uploadedBy =  $uploadedBy;

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
    public function setDeployedFiles($deployedFiles)
    {
        if (is_array($deployedFiles)) {
            $this->deployedFiles = [];
            foreach ($deployedFiles as $item) {
                if (!($item instanceof DeploymentFile)) {
                    if (is_array($item)) {
                        try {
                            $item = new DeploymentFile($item);
                        } catch (\Exception $e) {
                            trigger_error('Could not auto-instantiate DeploymentFile. '.$e->getMessage(), E_USER_WARNING);
                        }
                    } else {
                        trigger_error('Array parameter item is not of expected type "DeploymentFile"!', E_USER_WARNING);
                        continue;
                    }
                }
                $this->deployedFiles[] = $item;
            }
        }

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
        $this->objectId =  $objectId;

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
        $this->createdBy =  $createdBy;

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
        $this->updatedBy =  $updatedBy;

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
        $this->dirty =  $dirty;

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
     * @param string $systemName The system name of the property to get.
     *
     * @throws PropertyNotFoundException Thrown if the requested property does not exist.
     *
     * @return Property
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
        throw new PropertyNotFoundException('No Property with the system name "'.$systemName.'" exists.');
    }

    /**
     * Sets the "propertySets" of the MediaResponse.
     *
     * @param PropertySet[] $propertySets
     *
     * @return MediaResponse
     */
    public function setPropertySets($propertySets)
    {
        if (is_array($propertySets)) {
            $this->propertySets = [];
            foreach ($propertySets as $item) {
                if (!($item instanceof PropertySet)) {
                    if (is_array($item)) {
                        try {
                            $item = new PropertySet($item);
                        } catch (\Exception $e) {
                            trigger_error('Could not auto-instantiate PropertySet. '.$e->getMessage(), E_USER_WARNING);
                        }
                    } else {
                        trigger_error('Array parameter item is not of expected type "PropertySet"!', E_USER_WARNING);
                        continue;
                    }
                }
                $this->propertySets[] = $item;
            }
        }

        return $this;
    }

    /**
     * Gets a DeployedFile.
     *
     * @param int $templateId The id of the template to get.
     * @param string $templateType The type of template.
     * @param int $siteId The DeploymentSite id to get the template for. If not supplied, first available will be used.
     *
     * @throws NotFoundException Thrown if the requested deployed file does not exist.
     *
     * @return DeploymentFile
     */
    public function getDeployedFile($templateId, $templateType = self::TEMPLATE_IMAGE, $siteId = null)
    {
        foreach ($this->deployedFiles as $deployedFile) {
            /* @var DeploymentFile $deployedFile */
            if (($templateType == self::TEMPLATE_IMAGE && $templateId == $deployedFile->getImageTemplateId()) ||
                ($templateType == self::TEMPLATE_VIDEO && $templateId == $deployedFile->getVideoTemplateId())) {
                if ($siteId === null || $siteId == $deployedFile->getDeployMentSiteId()) {
                    return $deployedFile;
                }
            }
        }
        throw new NotFoundException('No DeploymentFile with the id "'.$templateId.'" exists.');
    }

    /**
     * Gets MetaData.
     *
     * @param string $section The Metadata section to get. Eg. "Exif", "IPTC", etc.
     * @param string $key The Metadata key to get. Eg. "width", "shutterspeed", etc.
     *
     * @throws NotFoundException Thrown if the requested Metadata does not exist.
     *
     * @return MetaData[]|MetaData|string The requested metadata
     */
    public function getMetadata($section = null, $key = null)
    {
        if ($section === null) {
            return $this->metadata;
        }
        foreach ($this->metadata as $md) {
            /* @var MetaData $md */
            if ($section != $md->getSection()) {
                continue;
            }
            if ($key === null) {
                return $md;
            }
            foreach ($md->getData() as $k => $data) {
                if ($key == $k) {
                    return $data;
                }
            }
            throw new NotFoundException('No metadata with section "'.$section.'" and key "'.$key.'" exists.');
        }
        throw new NotFoundException('No metadata with section "'.$section.'" exists.');
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array An associative array of the available variables.
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        if ($this->mediaId !== null) {
            $json['mediaId'] = $this->mediaId;
        }
        if ($this->thumbPreviewStatus !== null) {
            $json['thumbPreviewStatus'] = $this->thumbPreviewStatus;
        }
        if ($this->extension !== null) {
            $json['extension'] = $this->extension;
        }
        if ($this->metadata !== null && !empty($this->metadata)) {
            $json['metadata'] = $this->metadata;
        }
        if ($this->mimetype !== null) {
            $json['mimetype'] = $this->mimetype;
        }
        if ($this->size !== null) {
            $json['size'] = $this->size;
        }
        if ($this->statusId !== null) {
            $json['statusId'] = $this->statusId;
        }
        if ($this->uploaded !== null) {
            $json['uploaded'] = $this->uploaded;
        }
        if ($this->uploadedBy !== null) {
            $json['uploadedBy'] = $this->uploadedBy;
        }
        if ($this->deployedFiles !== null && !empty($this->deployedFiles)) {
            $json['deployedFiles'] = $this->deployedFiles;
        }
        if ($this->objectId !== null) {
            $json['objectId'] = $this->objectId;
        }
        if ($this->created !== null) {
            $json['created'] = $this->created;
        }
        if ($this->createdBy !== null) {
            $json['createdBy'] = $this->createdBy;
        }
        if ($this->updated !== null) {
            $json['updated'] = $this->updated;
        }
        if ($this->updatedBy !== null) {
            $json['updatedBy'] = $this->updatedBy;
        }
        if ($this->dirty !== null) {
            $json['dirty'] = $this->dirty;
        }
        if ($this->propertySets !== null && !empty($this->propertySets)) {
            $json['propertySets'] = $this->propertySets;
        }

        return $json;
    }
}