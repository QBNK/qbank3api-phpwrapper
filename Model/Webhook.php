<?php

namespace QBNK\QBank\API\Model;

class Webhook implements \JsonSerializable
{
    /** @var string Name of the webhook */
    protected $name;
    /** @var string Any notes regarding this webhook */
    protected $notes;
    /** @var string URI to call when events are triggered */
    protected $uri;
    /** @var object Array of string[] event names */
    protected $events;
    /** @var object Array of int[] group ID's */
    protected $filterGroups;
    /** @var string GET/POST/PUT/DELETE */
    protected $httpMethod;
    /** @var bool If relevant event data should be included in request body */
    protected $sendData;
    /** @var string FORM/JSON/MULITPART */
    protected $dataType;
    /** @var object Array of string[] headers to include with the request */
    protected $headers;

    /**
     * Constructs a Webhook.
     *
     * @param array $parameters An array of parameters to initialize the {@link Webhook} with.
     *                          - <b>name</b> - Name of the webhook
     *                          - <b>notes</b> - Any notes regarding this webhook
     *                          - <b>uri</b> - URI to call when events are triggered
     *                          - <b>events</b> - Array of string[] event names
     *                          - <b>filterGroups</b> - Array of int[] group ID's
     *                          - <b>httpMethod</b> - GET/POST/PUT/DELETE
     *                          - <b>sendData</b> - If relevant event data should be included in request body
     *                          - <b>dataType</b> - FORM/JSON/MULITPART
     *                          - <b>headers</b> - Array of string[] headers to include with the request
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['notes'])) {
            $this->setNotes($parameters['notes']);
        }
        if (isset($parameters['uri'])) {
            $this->setUri($parameters['uri']);
        }
        if (isset($parameters['events'])) {
            $this->setEvents($parameters['events']);
        }
        if (isset($parameters['filterGroups'])) {
            $this->setFilterGroups($parameters['filterGroups']);
        }
        if (isset($parameters['httpMethod'])) {
            $this->setHttpMethod($parameters['httpMethod']);
        }
        if (isset($parameters['sendData'])) {
            $this->setSendData($parameters['sendData']);
        }
        if (isset($parameters['dataType'])) {
            $this->setDataType($parameters['dataType']);
        }
        if (isset($parameters['headers'])) {
            $this->setHeaders($parameters['headers']);
        }
    }

    /**
     * Gets the name of the Webhook.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the Webhook.
     *
     * @param string $name
     *
     * @return Webhook
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the notes of the Webhook.
     * @return string	 */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the "notes" of the Webhook.
     *
     * @param string $notes
     *
     * @return Webhook
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Gets the uri of the Webhook.
     * @return string	 */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Sets the "uri" of the Webhook.
     *
     * @param string $uri
     *
     * @return Webhook
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Gets the events of the Webhook.
     * @return object	 */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Sets the "events" of the Webhook.
     *
     * @param array|string $events
     *
     * @return Webhook
     */
    public function setEvents($events)
    {
        if (is_array($events)) {
            $this->events = $events;

            return $this;
        }
        $this->events = json_decode($events, true);
        if (null === $this->events) {
            $this->events = $events;
        }

        return $this;
    }

    /**
     * Gets the filterGroups of the Webhook.
     * @return object	 */
    public function getFilterGroups()
    {
        return $this->filterGroups;
    }

    /**
     * Sets the "filterGroups" of the Webhook.
     *
     * @param array|string $filterGroups
     *
     * @return Webhook
     */
    public function setFilterGroups($filterGroups)
    {
        if (is_array($filterGroups)) {
            $this->filterGroups = $filterGroups;

            return $this;
        }
        $this->filterGroups = json_decode($filterGroups, true);
        if (null === $this->filterGroups) {
            $this->filterGroups = $filterGroups;
        }

        return $this;
    }

    /**
     * Gets the httpMethod of the Webhook.
     * @return string	 */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Sets the "httpMethod" of the Webhook.
     *
     * @param string $httpMethod
     *
     * @return Webhook
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;

        return $this;
    }

    /**
     * Tells whether the Webhook is sendData.
     * @return bool	 */
    public function isSendData()
    {
        return $this->sendData;
    }

    /**
     * Sets the "sendData" of the Webhook.
     *
     * @param bool $sendData
     *
     * @return Webhook
     */
    public function setSendData($sendData)
    {
        $this->sendData = $sendData;

        return $this;
    }

    /**
     * Gets the dataType of the Webhook.
     * @return string	 */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Sets the "dataType" of the Webhook.
     *
     * @param string $dataType
     *
     * @return Webhook
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * Gets the headers of the Webhook.
     * @return object	 */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Sets the "headers" of the Webhook.
     *
     * @param array|string $headers
     *
     * @return Webhook
     */
    public function setHeaders($headers)
    {
        if (is_array($headers)) {
            $this->headers = $headers;

            return $this;
        }
        $this->headers = json_decode($headers, true);
        if (null === $this->headers) {
            $this->headers = $headers;
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

        if (null !== $this->name) {
            $json['name'] = $this->name;
        }
        if (null !== $this->notes) {
            $json['notes'] = $this->notes;
        }
        if (null !== $this->uri) {
            $json['uri'] = $this->uri;
        }
        if (null !== $this->events) {
            $json['events'] = $this->events;
        }
        if (null !== $this->filterGroups) {
            $json['filterGroups'] = $this->filterGroups;
        }
        if (null !== $this->httpMethod) {
            $json['httpMethod'] = $this->httpMethod;
        }
        if (null !== $this->sendData) {
            $json['sendData'] = $this->sendData;
        }
        if (null !== $this->dataType) {
            $json['dataType'] = $this->dataType;
        }
        if (null !== $this->headers) {
            $json['headers'] = $this->headers;
        }

        return $json;
    }
}
