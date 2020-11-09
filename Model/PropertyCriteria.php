<?php

namespace QBNK\QBank\API\Model;

class PropertyCriteria implements \JsonSerializable
{
    const OPERATOR_EQUAL = '=';
    const OPERATOR_NOT_EQUAL = '!=';
    const OPERATOR_LIKE = '~~*';
    const OPERATOR_NOT_LIKE = '!~~*';
    const OPERATOR_LESS = 'lt';
    const OPERATOR_LESS_OR_EMPTY = 'lt0';
    const OPERATOR_LESS_OR_EQUAL = 'lte';
    const OPERATOR_LESS_OR_EQUAL_OR_EMPTY = 'lte0';
    const OPERATOR_GREATER = 'gt';
    const OPERATOR_GREATER_OR_EMPTY = 'gt0';
    const OPERATOR_GREATER_OR_EQUAL = 'gte';
    const OPERATOR_GREATER_OR_EQUAL_OR_EMPTY = 'gte0';
    const OPERATOR_BETWEEN = 'BETWEEN';
    const OPERATOR_CONTAINS_ANY = '&&';
    const OPERATOR_NOT_CONTAINS_ANY = '!&&';
    const OPERATOR_CONTAINS_ALL = '@>';
    const NO_VALUE = '0';
    const HAS_VALUE = '1';
    const HIERARCHICAL_ANY = 'h1';
    const HIERARCHICAL_ALL = 'h2';

    /** @var string The system name of the Property we filter on */
    protected $systemName;
    /** @var string The value we filter by */
    protected $value;
    /** @var string Comparison operator for the criteria */
    protected $operator;

    /**
     * Constructs a PropertyCriteria.
     *
     * @param array $parameters An array of parameters to initialize the {@link PropertyCriteria} with.
     *                          - <b>systemName</b> - The system name of the Property we filter on
     *                          - <b>value</b> - The value we filter by
     *                          - <b>operator</b> - Comparison operator for the criteria
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['systemName'])) {
            $this->setSystemName($parameters['systemName']);
        }
        if (isset($parameters['value'])) {
            $this->setValue($parameters['value']);
        }
        if (isset($parameters['operator'])) {
            $this->setOperator($parameters['operator']);
        }
    }

    /**
     * Gets the systemName of the PropertyCriteria.
     * @return string	 */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * Sets the "systemName" of the PropertyCriteria.
     *
     * @param string $systemName
     *
     * @return PropertyCriteria
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;

        return $this;
    }

    /**
     * Gets the value of the PropertyCriteria.
     * @return string	 */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the "value" of the PropertyCriteria.
     *
     * @param string $value
     *
     * @return PropertyCriteria
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Gets the operator of the PropertyCriteria.
     * @return string	 */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Sets the "operator" of the PropertyCriteria.
     *
     * @param string $operator
     *
     * @return PropertyCriteria
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

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
            $json['value'] = $this->value;
        }
        if (null !== $this->operator) {
            $json['operator'] = $this->operator;
        }

        return $json;
    }
}
