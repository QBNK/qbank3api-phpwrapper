<?php

namespace QBNK\QBank\API\Model;

class Protocol implements \JsonSerializable
{
    /** @var int The Protocol identifier. */
    protected $id;
    /** @var string The human readable description of the Protocol. */
    protected $description;
    /** @var string The Protocol name. */
    protected $name;
    /** @var object The Protocol definition. Describes the needed values and other parameters. */
    protected $definition;

    /**
     * Constructs a Protocol.
     *
     * @param array $parameters An array of parameters to initialize the {@link Protocol} with.
     *                          - <b>id</b> - The Protocol identifier.
     *                          - <b>description</b> - The human readable description of the Protocol.
     *                          - <b>name</b> - The Protocol name.
     *                          - <b>definition</b> - The Protocol definition. Describes the needed values and other parameters.
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['description'])) {
            $this->setDescription($parameters['description']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['definition'])) {
            $this->setDefinition($parameters['definition']);
        }
    }

    /**
     * Gets the id of the Protocol.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the Protocol.
     *
     * @param int $id
     *
     * @return Protocol
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the description of the Protocol.
     * @return string	 */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the "description" of the Protocol.
     *
     * @param string $description
     *
     * @return Protocol
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the name of the Protocol.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Protocol.
     *
     * @param string $name
     *
     * @return Protocol
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the definition of the Protocol.
     * @return object	 */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Sets the "definition" of the Protocol.
     *
     * @param array|string $definition
     *
     * @return Protocol
     */
    public function setDefinition($definition)
    {
        if (is_array($definition)) {
            $this->definition = $definition;

            return $this;
        }
        $this->definition = json_decode($definition, true);
        if (null === $this->definition) {
            $this->definition = $definition;
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
        if (null !== $this->description) {
            $json['description'] = $this->description;
        }
        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->definition) {
            $json['definition'] = $this->definition;
        }

        return $json;
    }
}
