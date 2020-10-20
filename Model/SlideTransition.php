<?php

namespace QBNK\QBank\API\Model;

class SlideTransition implements \JsonSerializable
{
    /** @var int The transition to use */
    protected $type;
    /** @var int Speed of the transition, in milliseconds */
    protected $speed;
    /** @var int Advance to the next slide after X milliseconds */
    protected $advanceAfterTime;
    /** @var bool Indicates if we should move to the next slide on mouse click */
    protected $advanceOnClick;
    /** @var int Orientation of transition, if applicable */
    protected $orientation;
    /** @var int Direction of transition, if applicable */
    protected $direction;
    /** @var int Pattern of transition, if applicable */
    protected $pattern;
    /** @var bool Indicates if transition should bounce, if applicable */
    protected $bounce;
    /** @var bool Indicates if transition should bounce, if applicable */
    protected $fromBlack;

    /**
     * Constructs a SlideTransition.
     *
     * @param array $parameters An array of parameters to initialize the {@link SlideTransition} with.
     *                          - <b>type</b> - The transition to use
     *                          - <b>speed</b> - Speed of the transition, in milliseconds
     *                          - <b>advanceAfterTime</b> - Advance to the next slide after X milliseconds
     *                          - <b>advanceOnClick</b> - Indicates if we should move to the next slide on mouse click
     *                          - <b>orientation</b> - Orientation of transition, if applicable
     *                          - <b>direction</b> - Direction of transition, if applicable
     *                          - <b>pattern</b> - Pattern of transition, if applicable
     *                          - <b>bounce</b> - Indicates if transition should bounce, if applicable
     *                          - <b>fromBlack</b> - Indicates if transition should bounce, if applicable
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['type'])) {
            $this->setType($parameters['type']);
        }
        if (isset($parameters['speed'])) {
            $this->setSpeed($parameters['speed']);
        }
        if (isset($parameters['advanceAfterTime'])) {
            $this->setAdvanceAfterTime($parameters['advanceAfterTime']);
        }
        if (isset($parameters['advanceOnClick'])) {
            $this->setAdvanceOnClick($parameters['advanceOnClick']);
        }
        if (isset($parameters['orientation'])) {
            $this->setOrientation($parameters['orientation']);
        }
        if (isset($parameters['direction'])) {
            $this->setDirection($parameters['direction']);
        }
        if (isset($parameters['pattern'])) {
            $this->setPattern($parameters['pattern']);
        }
        if (isset($parameters['bounce'])) {
            $this->setBounce($parameters['bounce']);
        }
        if (isset($parameters['fromBlack'])) {
            $this->setFromBlack($parameters['fromBlack']);
        }
    }

    /**
     * Gets the type of the SlideTransition.
     * @return int	 */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the "type" of the SlideTransition.
     *
     * @param int $type
     *
     * @return SlideTransition
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the speed of the SlideTransition.
     * @return int	 */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Sets the "speed" of the SlideTransition.
     *
     * @param int $speed
     *
     * @return SlideTransition
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Gets the advanceAfterTime of the SlideTransition.
     * @return int	 */
    public function getAdvanceAfterTime()
    {
        return $this->advanceAfterTime;
    }

    /**
     * Sets the "advanceAfterTime" of the SlideTransition.
     *
     * @param int $advanceAfterTime
     *
     * @return SlideTransition
     */
    public function setAdvanceAfterTime($advanceAfterTime)
    {
        $this->advanceAfterTime = $advanceAfterTime;

        return $this;
    }

    /**
     * Tells whether the SlideTransition is advanceOnClick.
     * @return bool	 */
    public function isAdvanceOnClick()
    {
        return $this->advanceOnClick;
    }

    /**
     * Sets the "advanceOnClick" of the SlideTransition.
     *
     * @param bool $advanceOnClick
     *
     * @return SlideTransition
     */
    public function setAdvanceOnClick($advanceOnClick)
    {
        $this->advanceOnClick = $advanceOnClick;

        return $this;
    }

    /**
     * Gets the orientation of the SlideTransition.
     * @return int	 */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Sets the "orientation" of the SlideTransition.
     *
     * @param int $orientation
     *
     * @return SlideTransition
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Gets the direction of the SlideTransition.
     * @return int	 */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Sets the "direction" of the SlideTransition.
     *
     * @param int $direction
     *
     * @return SlideTransition
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Gets the pattern of the SlideTransition.
     * @return int	 */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Sets the "pattern" of the SlideTransition.
     *
     * @param int $pattern
     *
     * @return SlideTransition
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Tells whether the SlideTransition is bounce.
     * @return bool	 */
    public function isBounce()
    {
        return $this->bounce;
    }

    /**
     * Sets the "bounce" of the SlideTransition.
     *
     * @param bool $bounce
     *
     * @return SlideTransition
     */
    public function setBounce($bounce)
    {
        $this->bounce = $bounce;

        return $this;
    }

    /**
     * Tells whether the SlideTransition is fromBlack.
     * @return bool	 */
    public function isFromBlack()
    {
        return $this->fromBlack;
    }

    /**
     * Sets the "fromBlack" of the SlideTransition.
     *
     * @param bool $fromBlack
     *
     * @return SlideTransition
     */
    public function setFromBlack($fromBlack)
    {
        $this->fromBlack = $fromBlack;

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

        if (null !== $this->type) {
            $json['type'] = $this->type;
        }
        if (null !== $this->speed) {
            $json['speed'] = $this->speed;
        }
        if (null !== $this->advanceAfterTime) {
            $json['advanceAfterTime'] = $this->advanceAfterTime;
        }
        if (null !== $this->advanceOnClick) {
            $json['advanceOnClick'] = $this->advanceOnClick;
        }
        if (null !== $this->orientation) {
            $json['orientation'] = $this->orientation;
        }
        if (null !== $this->direction) {
            $json['direction'] = $this->direction;
        }
        if (null !== $this->pattern) {
            $json['pattern'] = $this->pattern;
        }
        if (null !== $this->bounce) {
            $json['bounce'] = $this->bounce;
        }
        if (null !== $this->fromBlack) {
            $json['fromBlack'] = $this->fromBlack;
        }

        return $json;
    }
}
