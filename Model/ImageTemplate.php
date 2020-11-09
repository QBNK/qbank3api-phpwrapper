<?php

namespace QBNK\QBank\API\Model;

class ImageTemplate implements \JsonSerializable
{
    /** @var int The Image Template identifier */
    protected $id;
    /** @var string The name of the Image Template */
    protected $name;
    /** @var MimeType */
    protected $mimeType;
    /** @var Command[] An array of commands for this template */
    protected $commands;

    /**
     * Constructs a ImageTemplate.
     *
     * @param array $parameters An array of parameters to initialize the {@link ImageTemplate} with.
     *                          - <b>id</b> - The Image Template identifier
     *                          - <b>name</b> - The name of the Image Template
     *                          - <b>mimeType</b> -
     *                          - <b>commands</b> - An array of commands for this template
     */
    public function __construct($parameters = [])
    {
        $this->commands = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['mimeType'])) {
            $this->setMimeType($parameters['mimeType']);
        }
        if (isset($parameters['commands'])) {
            $this->setCommands($parameters['commands']);
        }
    }

    /**
     * Gets the id of the ImageTemplate.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the ImageTemplate.
     *
     * @param int $id
     *
     * @return ImageTemplate
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the name of the ImageTemplate.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the ImageTemplate.
     *
     * @param string $name
     *
     * @return ImageTemplate
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the mimeType of the ImageTemplate.
     * @return MimeType	 */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Sets the "mimeType" of the ImageTemplate.
     *
     * @param MimeType $mimeType
     *
     * @return ImageTemplate
     */
    public function setMimeType($mimeType)
    {
        if ($mimeType instanceof MimeType) {
            $this->mimeType = $mimeType;
        } elseif (is_array($mimeType)) {
            $this->mimeType = new MimeType($mimeType);
        } else {
            $this->mimeType = null;
            trigger_error('Argument must be an object of class MimeType. Data loss!', E_USER_WARNING);
        }

        return $this;
    }

    /**
     * Gets the commands of the ImageTemplate.
     * @return Command[]	 */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Sets the "commands" of the ImageTemplate.
     *
     * @param Command[] $commands
     *
     * @return ImageTemplate
     */
    public function setCommands(array $commands)
    {
        $this->commands = [];

        foreach ($commands as $item) {
            $this->addCommand($item);
        }

        return $this;
    }

    /**
     * Adds an object of "Commands" of the ImageTemplate.
     *
     * @param Command|array $item
     *
     * @return ImageTemplate
     */
    public function addCommand($item)
    {
        if (!($item instanceof Command)) {
            if (is_array($item)) {
                try {
                    $item = new Command($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate Command. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "Command"!', E_USER_WARNING);
            }
        }
        $this->commands[] = $item;

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
        if (null !== $this->mimeType) {
            $json['mimeType'] = $this->mimeType;
        }
        if (null !== $this->commands && !empty($this->commands)) {
            $json['commands'] = $this->commands;
        }

        return $json;
    }
}
