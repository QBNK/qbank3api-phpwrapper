<?php

namespace QBNK\QBank\API\Model;

class FolderParent implements \JsonSerializable
{
    /** @var int The Folder identifier. */
    protected $folderid;
    /** @var int The distance from the specified Folder identifer, ie. the reverse depth. */
    protected $depth;
    /** @var string The name of the folder */
    protected $name;

    /**
     * Constructs a FolderParent.
     *
     * @param array $parameters An array of parameters to initialize the {@link FolderParent} with.
     *                          - <b>folderid</b> - The Folder identifier.
     *                          - <b>depth</b> - The distance from the specified Folder identifer, ie. the reverse depth.
     *                          - <b>name</b> - The name of the folder
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['folderid'])) {
            $this->setFolderid($parameters['folderid']);
        }
        if (isset($parameters['depth'])) {
            $this->setDepth($parameters['depth']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
    }

    /**
     * Gets the folderid of the FolderParent.
     * @return int	 */
    public function getFolderid()
    {
        return $this->folderid;
    }

    /**
     * Sets the "folderid" of the FolderParent.
     *
     * @param int $folderid
     *
     * @return FolderParent
     */
    public function setFolderid($folderid)
    {
        $this->folderid = $folderid;

        return $this;
    }

    /**
     * Gets the depth of the FolderParent.
     * @return int	 */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Sets the "depth" of the FolderParent.
     *
     * @param int $depth
     *
     * @return FolderParent
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Gets the name of the FolderParent.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the FolderParent.
     *
     * @param string $name
     *
     * @return FolderParent
     */
    public function setName($name)
    {
        $this->name = $name;

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

        if (null !== $this->folderid) {
            $json['folderid'] = $this->folderid;
        }
        if (null !== $this->depth) {
            $json['depth'] = $this->depth;
        }
        if (null !== $this->name) {
            $json['name'] = $this->name;
        }

        return $json;
    }
}
