<?php

namespace QBNK\QBank\API\Model;

class Property implements \JsonSerializable
{
    /** @var string The system name of the Property we filter on */
    protected $systemName;
    /** @var string The value we filter by */
    protected $value;

    /**
     * Constructs a Property.
     *
     * @param array $parameters An array of parameters to initialize the {@link Property} with.
     *                          - <b>systemName</b> - The system name of the Property we filter on
     *                          - <b>value</b> - The value we filter by
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['systemName'])) {
            $this->setSystemName($parameters['systemName']);
        }
        if (isset($parameters['value'])) {
            $this->setValue($parameters['value']);
        }
    }

    /**
     * Gets the systemName of the Property.
     * @return string	 */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * Sets the "systemName" of the Property.
     *
     * @param string $systemName
     *
     * @return Property
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;

        return $this;
    }

    /**
     * Gets the value of the Property.
     * @return string	 */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the "value" of the Property.
     *
     * @param string $value
     *
     * @return Property
     */
    public function setValue($value)
    {
        $this->value = $value;

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

        if (null !== $this->systemName) {
            $json['systemName'] = $this->systemName;
        }
        if (null !== $this->value) {
            if ($this->value instanceof \DateTime) {
                $json['value'] = $this->value->format(\DateTime::ATOM);
            } else {
                $json['value'] = $this->value;
            }
        }

        return $json;
    }
}
