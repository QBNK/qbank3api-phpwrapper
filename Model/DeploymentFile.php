<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class DeploymentFile implements \JsonSerializable
{
    /** @var int The identifier of the DeploymentSite this file is deployed to. */
    protected $deploymentSiteId;
    /** @var string The filename of the deployed file. */
    protected $remoteFile;
    /** @var int The identifier of the Image template used. */
    protected $imageTemplateId;
    /** @var int The identifier of the Video template used. */
    protected $videoTemplateId;
    /** @var int The identifier of the Audio template used. */
    protected $audioTemplateId;
    /** @var int The identifier of the Document template used. */
    protected $documentTemplateId;
    /** @var int The identifier of the Font template used. */
    protected $fontTemplateId;
    /** @var string The name of the template, if any. */
    protected $templateName;
    /** @var DateTime The time of publishing for this file. */
    protected $created;
    /** @var DateTime The time of the last re-publishing for this file. */
    protected $updated;
    /** @var string The original filename of the file when uploaded to QBank. */
    protected $filename;
    /** @var int The size of the file on disk */
    protected $filesize;
    /** @var object Metadata associated with the deployed media */
    protected $metadata;

    /**
     * Constructs a DeploymentFile.
     *
     * @param array $parameters An array of parameters to initialize the {@link DeploymentFile} with.
     *                          - <b>deploymentSiteId</b> - The identifier of the DeploymentSite this file is deployed to.
     *                          - <b>remoteFile</b> - The filename of the deployed file.
     *                          - <b>imageTemplateId</b> - The identifier of the Image template used.
     *                          - <b>videoTemplateId</b> - The identifier of the Video template used.
     *                          - <b>audioTemplateId</b> - The identifier of the Audio template used.
     *                          - <b>documentTemplateId</b> - The identifier of the Document template used.
     *                          - <b>fontTemplateId</b> - The identifier of the Font template used.
     *                          - <b>templateName</b> - The name of the template, if any.
     *                          - <b>created</b> - The time of publishing for this file.
     *                          - <b>updated</b> - The time of the last re-publishing for this file.
     *                          - <b>filename</b> - The original filename of the file when uploaded to QBank.
     *                          - <b>filesize</b> - The size of the file on disk
     *                          - <b>metadata</b> - Metadata associated with the deployed media
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['deploymentSiteId'])) {
            $this->setDeploymentSiteId($parameters['deploymentSiteId']);
        }
        if (isset($parameters['remoteFile'])) {
            $this->setRemoteFile($parameters['remoteFile']);
        }
        if (isset($parameters['imageTemplateId'])) {
            $this->setImageTemplateId($parameters['imageTemplateId']);
        }
        if (isset($parameters['videoTemplateId'])) {
            $this->setVideoTemplateId($parameters['videoTemplateId']);
        }
        if (isset($parameters['audioTemplateId'])) {
            $this->setAudioTemplateId($parameters['audioTemplateId']);
        }
        if (isset($parameters['documentTemplateId'])) {
            $this->setDocumentTemplateId($parameters['documentTemplateId']);
        }
        if (isset($parameters['fontTemplateId'])) {
            $this->setFontTemplateId($parameters['fontTemplateId']);
        }
        if (isset($parameters['templateName'])) {
            $this->setTemplateName($parameters['templateName']);
        }
        if (isset($parameters['created'])) {
            $this->setCreated($parameters['created']);
        }
        if (isset($parameters['updated'])) {
            $this->setUpdated($parameters['updated']);
        }
        if (isset($parameters['filename'])) {
            $this->setFilename($parameters['filename']);
        }
        if (isset($parameters['filesize'])) {
            $this->setFilesize($parameters['filesize']);
        }
        if (isset($parameters['metadata'])) {
            $this->setMetadata($parameters['metadata']);
        }
    }

    /**
     * Gets the deploymentSiteId of the DeploymentFile.
     * @return int	 */
    public function getDeploymentSiteId()
    {
        return $this->deploymentSiteId;
    }

    /**
     * Sets the "deploymentSiteId" of the DeploymentFile.
     *
     * @param int $deploymentSiteId
     *
     * @return DeploymentFile
     */
    public function setDeploymentSiteId($deploymentSiteId)
    {
        $this->deploymentSiteId = $deploymentSiteId;

        return $this;
    }

    /**
     * Gets the remoteFile of the DeploymentFile.
     * @return string	 */
    public function getRemoteFile()
    {
        return $this->remoteFile;
    }

    /**
     * Sets the "remoteFile" of the DeploymentFile.
     *
     * @param string $remoteFile
     *
     * @return DeploymentFile
     */
    public function setRemoteFile($remoteFile)
    {
        $this->remoteFile = $remoteFile;

        return $this;
    }

    /**
     * Gets the imageTemplateId of the DeploymentFile.
     * @return int	 */
    public function getImageTemplateId()
    {
        return $this->imageTemplateId;
    }

    /**
     * Sets the "imageTemplateId" of the DeploymentFile.
     *
     * @param int $imageTemplateId
     *
     * @return DeploymentFile
     */
    public function setImageTemplateId($imageTemplateId)
    {
        $this->imageTemplateId = $imageTemplateId;

        return $this;
    }

    /**
     * Gets the videoTemplateId of the DeploymentFile.
     * @return int	 */
    public function getVideoTemplateId()
    {
        return $this->videoTemplateId;
    }

    /**
     * Sets the "videoTemplateId" of the DeploymentFile.
     *
     * @param int $videoTemplateId
     *
     * @return DeploymentFile
     */
    public function setVideoTemplateId($videoTemplateId)
    {
        $this->videoTemplateId = $videoTemplateId;

        return $this;
    }

    /**
     * Gets the audioTemplateId of the DeploymentFile.
     * @return int	 */
    public function getAudioTemplateId()
    {
        return $this->audioTemplateId;
    }

    /**
     * Sets the "audioTemplateId" of the DeploymentFile.
     *
     * @param int $audioTemplateId
     *
     * @return DeploymentFile
     */
    public function setAudioTemplateId($audioTemplateId)
    {
        $this->audioTemplateId = $audioTemplateId;

        return $this;
    }

    /**
     * Gets the documentTemplateId of the DeploymentFile.
     * @return int	 */
    public function getDocumentTemplateId()
    {
        return $this->documentTemplateId;
    }

    /**
     * Sets the "documentTemplateId" of the DeploymentFile.
     *
     * @param int $documentTemplateId
     *
     * @return DeploymentFile
     */
    public function setDocumentTemplateId($documentTemplateId)
    {
        $this->documentTemplateId = $documentTemplateId;

        return $this;
    }

    /**
     * Gets the fontTemplateId of the DeploymentFile.
     * @return int	 */
    public function getFontTemplateId()
    {
        return $this->fontTemplateId;
    }

    /**
     * Sets the "fontTemplateId" of the DeploymentFile.
     *
     * @param int $fontTemplateId
     *
     * @return DeploymentFile
     */
    public function setFontTemplateId($fontTemplateId)
    {
        $this->fontTemplateId = $fontTemplateId;

        return $this;
    }

    /**
     * Gets the templateName of the DeploymentFile.
     * @return string	 */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Sets the "templateName" of the DeploymentFile.
     *
     * @param string $templateName
     *
     * @return DeploymentFile
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;

        return $this;
    }

    /**
     * Gets the created of the DeploymentFile.
     * @return DateTime	 */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the "created" of the DeploymentFile.
     *
     * @param DateTime $created
     *
     * @return DeploymentFile
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
     * Gets the updated of the DeploymentFile.
     * @return DateTime	 */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets the "updated" of the DeploymentFile.
     *
     * @param DateTime $updated
     *
     * @return DeploymentFile
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
     * Gets the filename of the DeploymentFile.
     * @return string	 */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Sets the "filename" of the DeploymentFile.
     *
     * @param string $filename
     *
     * @return DeploymentFile
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Gets the filesize of the DeploymentFile.
     * @return int	 */
    public function getFilesize()
    {
        return $this->filesize;
    }

    /**
     * Sets the "filesize" of the DeploymentFile.
     *
     * @param int $filesize
     *
     * @return DeploymentFile
     */
    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;

        return $this;
    }

    /**
     * Gets the metadata of the DeploymentFile.
     * @return object	 */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Sets the "metadata" of the DeploymentFile.
     *
     * @param array|string $metadata
     *
     * @return DeploymentFile
     */
    public function setMetadata($metadata)
    {
        if (is_array($metadata)) {
            $this->metadata = $metadata;

            return $this;
        }
        $this->metadata = json_decode($metadata, true);
        if (null === $this->metadata) {
            $this->metadata = $metadata;
        }

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

        if (null !== $this->deploymentSiteId) {
            $json['deploymentSiteId'] = $this->deploymentSiteId;
        }
        if (null !== $this->remoteFile) {
            $json['remoteFile'] = $this->remoteFile;
        }
        if (null !== $this->imageTemplateId) {
            $json['imageTemplateId'] = $this->imageTemplateId;
        }
        if (null !== $this->videoTemplateId) {
            $json['videoTemplateId'] = $this->videoTemplateId;
        }
        if (null !== $this->audioTemplateId) {
            $json['audioTemplateId'] = $this->audioTemplateId;
        }
        if (null !== $this->documentTemplateId) {
            $json['documentTemplateId'] = $this->documentTemplateId;
        }
        if (null !== $this->fontTemplateId) {
            $json['fontTemplateId'] = $this->fontTemplateId;
        }
        if (null !== $this->templateName) {
            $json['templateName'] = $this->templateName;
        }
        if (null !== $this->created) {
            $json['created'] = $this->created->format(\DateTime::ATOM);
        }
        if (null !== $this->updated) {
            $json['updated'] = $this->updated->format(\DateTime::ATOM);
        }
        if (null !== $this->filename) {
            $json['filename'] = $this->filename;
        }
        if (null !== $this->filesize) {
            $json['filesize'] = $this->filesize;
        }
        if (null !== $this->metadata) {
            $json['metadata'] = $this->metadata;
        }

        return $json;
    }
}
