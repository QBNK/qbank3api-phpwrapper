<?php

namespace QBNK\QBank\API\Model;

class MetaData implements \JsonSerializable
{
    /** @var string The MetaData section name. */
    protected $section;
    /** @var object The MetaData data as a key-value object. */
    protected $data;

    /**
     * Constructs a MetaData.
     *
     * @param array $parameters An array of parameters to initialize the {@link MetaData} with.
     *                          - <b>section</b> - The MetaData section name.
     *                          - <b>data</b> - The MetaData data as a key-value object.
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['section'])) {
            $this->setSection($parameters['section']);
        }
        if (isset($parameters['data'])) {
            $this->setData($parameters['data']);
        }
    }

    /**
     * Gets the section of the MetaData.
     * @return string	 */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Sets the "section" of the MetaData.
     *
     * @param string $section
     *
     * @return MetaData
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Gets the data of the MetaData.
     * @return object	 */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the "data" of the MetaData.
     *
     * @param array|string $data
     *
     * @return MetaData
     */
    public function setData($data)
    {
        if (is_array($data)) {
            $this->data = $data;

            return $this;
        }
        $this->data = json_decode($data, true);
        if (null === $this->data) {
            $this->data = $data;
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

        if (null !== $this->section) {
            $json['section'] = $this->section;
        }
        if (null !== $this->data) {
            $json['data'] = $this->data;
        }

        return $json;
    }
}
