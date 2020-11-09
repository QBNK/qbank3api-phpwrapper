<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class Moodboard implements \JsonSerializable
{
    /** @var string The pincode used to access this Moodboard. */
    protected $pinCode;
    /** @var int The template used by the Moodboard. */
    protected $templateId;
    /** @var DateTime The date and time this Moodboard expires. */
    protected $expireDate;
    /** @var object A Key/Value Object containing specific template related settings. */
    protected $definition;
    /** @var bool Whether this moodboard should notify owner on visits and uploads */
    protected $visitNotification;
    /** @var string The Objects name. */
    protected $name;
    /** @var bool Whether the object is deleted. */
    protected $deleted;
    /** @var string[] A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object. */
    protected $properties;
    /** @var int The identifier of the ObjectType describing the propertysets this object should use. */
    protected $typeId;

    /**
     * Constructs a Moodboard.
     *
     * @param array $parameters An array of parameters to initialize the {@link Moodboard} with.
     *                          - <b>pinCode</b> - The pincode used to access this Moodboard.
     *                          - <b>templateId</b> - The template used by the Moodboard.
     *                          - <b>expireDate</b> - The date and time this Moodboard expires.
     *                          - <b>definition</b> - A Key/Value Object containing specific template related settings.
     *                          - <b>visitNotification</b> - Whether this moodboard should notify owner on visits and uploads
     *                          - <b>name</b> - The Objects name.
     *                          - <b>deleted</b> - Whether the object is deleted.
     *                          - <b>properties</b> - A systemName => value array of properties. This is only used when updating an object. See the "propertySets" parameter for complete properties when fetching an object.
     *                          - <b>typeId</b> - The identifier of the ObjectType describing the propertysets this object should use.
     */
    public function __construct($parameters = [])
    {
        $this->properties = [];

        if (isset($parameters['pinCode'])) {
            $this->setPinCode($parameters['pinCode']);
        }
        if (isset($parameters['templateId'])) {
            $this->setTemplateId($parameters['templateId']);
        }
        if (isset($parameters['expireDate'])) {
            $this->setExpireDate($parameters['expireDate']);
        }
        if (isset($parameters['definition'])) {
            $this->setDefinition($parameters['definition']);
        }
        if (isset($parameters['visitNotification'])) {
            $this->setVisitNotification($parameters['visitNotification']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['deleted'])) {
            $this->setDeleted($parameters['deleted']);
        }
        if (isset($parameters['properties'])) {
            $this->setProperties($parameters['properties']);
        }
        if (isset($parameters['typeId'])) {
            $this->setTypeId($parameters['typeId']);
        }
    }

    /**
     * Gets the pinCode of the Moodboard.
     * @return string	 */
    public function getPinCode()
    {
        return $this->pinCode;
    }

    /**
     * Sets the "pinCode" of the Moodboard.
     *
     * @param string $pinCode
     *
     * @return Moodboard
     */
    public function setPinCode($pinCode)
    {
        $this->pinCode = $pinCode;

        return $this;
    }

    /**
     * Gets the templateId of the Moodboard.
     * @return int	 */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * Sets the "templateId" of the Moodboard.
     *
     * @param int $templateId
     *
     * @return Moodboard
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * Gets the expireDate of the Moodboard.
     * @return DateTime	 */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * Sets the "expireDate" of the Moodboard.
     *
     * @param DateTime $expireDate
     *
     * @return Moodboard
     */
    public function setExpireDate($expireDate)
    {
        if ($expireDate instanceof DateTime) {
            $this->expireDate = $expireDate;
        } else {
            try {
                $this->expireDate = new DateTime($expireDate);
            } catch (\Exception $e) {
                $this->expireDate = null;
            }
        }

        return $this;
    }

    /**
     * Gets the definition of the Moodboard.
     * @return object	 */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Sets the "definition" of the Moodboard.
     *
     * @param array|string $definition
     *
     * @return Moodboard
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
     * Tells whether the Moodboard is visitNotification.
     * @return bool	 */
    public function isVisitNotification()
    {
        return $this->visitNotification;
    }

    /**
     * Sets the "visitNotification" of the Moodboard.
     *
     * @param bool $visitNotification
     *
     * @return Moodboard
     */
    public function setVisitNotification($visitNotification)
    {
        $this->visitNotification = $visitNotification;

        return $this;
    }

    /**
     * Gets the name of the Moodboard.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Moodboard.
     *
     * @param string $name
     *
     * @return Moodboard
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Tells whether the Moodboard is deleted.
     * @return bool	 */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the "deleted" of the Moodboard.
     *
     * @param bool $deleted
     *
     * @return Moodboard
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Gets the properties of the Moodboard.
     * @return string[]	 */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets the "properties" of the Moodboard.
     *
     * @param string[] $properties
     *
     * @return Moodboard
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Gets the typeId of the Moodboard.
     * @return int	 */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Sets the "typeId" of the Moodboard.
     *
     * @param int $typeId
     *
     * @return Moodboard
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

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

        if (null !== $this->pinCode) {
            $json['pinCode'] = $this->pinCode;
        }
        if (null !== $this->templateId) {
            $json['templateId'] = $this->templateId;
        }
        if (null !== $this->expireDate) {
            $json['expireDate'] = $this->expireDate->format(\DateTime::ATOM);
        }
        if (null !== $this->definition) {
            $json['definition'] = $this->definition;
        }
        if (null !== $this->visitNotification) {
            $json['visitNotification'] = $this->visitNotification;
        }
        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->deleted) {
            $json['deleted'] = $this->deleted;
        }
        if (null !== $this->properties && !empty($this->properties)) {
            $json['properties'] = $this->properties;
        }
        if (null !== $this->typeId) {
            $json['typeId'] = $this->typeId;
        }

        return $json;
    }
}
