<?php

namespace QBNK\QBank\API\Model;

use DateTime;

class DateTimeRange implements \JsonSerializable
{
    /** @var DateTime Minimum date in this range, leave empty for none. */
    protected $min;
    /** @var DateTime Maximum date in this range, leave empty for none. */
    protected $max;

    /**
     * Constructs a DateTimeRange.
     *
     * @param array $parameters An array of parameters to initialize the {@link DateTimeRange} with.
     *                          - <b>min</b> - Minimum date in this range, leave empty for none.
     *                          - <b>max</b> - Maximum date in this range, leave empty for none.
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['min'])) {
            $this->setMin($parameters['min']);
        }
        if (isset($parameters['max'])) {
            $this->setMax($parameters['max']);
        }
    }

    /**
     * Gets the min of the DateTimeRange.
     * @return DateTime	 */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Sets the "min" of the DateTimeRange.
     *
     * @param DateTime $min
     *
     * @return DateTimeRange
     */
    public function setMin($min)
    {
        if ($min instanceof DateTime) {
            $this->min = $min;
        } else {
            try {
                $this->min = new DateTime($min);
            } catch (\Exception $e) {
                $this->min = null;
            }
        }

        return $this;
    }

    /**
     * Gets the max of the DateTimeRange.
     * @return DateTime	 */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Sets the "max" of the DateTimeRange.
     *
     * @param DateTime $max
     *
     * @return DateTimeRange
     */
    public function setMax($max)
    {
        if ($max instanceof DateTime) {
            $this->max = $max;
        } else {
            try {
                $this->max = new DateTime($max);
            } catch (\Exception $e) {
                $this->max = null;
            }
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

        if (null !== $this->min) {
            $json['min'] = $this->min->format(\DateTime::ATOM);
        }
        if (null !== $this->max) {
            $json['max'] = $this->max->format(\DateTime::ATOM);
        }

        return $json;
    }
}
