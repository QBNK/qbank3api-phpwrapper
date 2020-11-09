<?php

namespace QBNK\QBank\API\Model;

class MoodboardTemplateResponse implements \JsonSerializable
{
    /** @var int The template identifier. */
    protected $id;
    /** @var string The template name. */
    protected $name;
    /** @var object Dynamic object detailing the templates options. */
    protected $options;

    /**
     * Constructs a MoodboardTemplateResponse.
     *
     * @param array $parameters An array of parameters to initialize the {@link MoodboardTemplateResponse} with.
     *                          - <b>id</b> - The template identifier.
     *                          - <b>name</b> - The template name.
     *                          - <b>options</b> - Dynamic object detailing the templates options.
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['options'])) {
            $this->setOptions($parameters['options']);
        }
    }

    /**
     * Gets the id of the MoodboardTemplateResponse.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the MoodboardTemplateResponse.
     *
     * @param int $id
     *
     * @return MoodboardTemplateResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the MoodboardTemplateResponse.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the MoodboardTemplateResponse.
     *
     * @param string $name
     *
     * @return MoodboardTemplateResponse
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the options of the MoodboardTemplateResponse.
     * @return object	 */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets the "options" of the MoodboardTemplateResponse.
     *
     * @param array|string $options
     *
     * @return MoodboardTemplateResponse
     */
    public function setOptions($options)
    {
        if (is_array($options)) {
            $this->options = $options;

            return $this;
        }
        $this->options = json_decode($options, true);
        if (null === $this->options) {
            $this->options = $options;
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

        if (null !== $this->id) {
            $json['id'] = $this->id;
        }
        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->options) {
            $json['options'] = $this->options;
        }

        return $json;
    }
}
