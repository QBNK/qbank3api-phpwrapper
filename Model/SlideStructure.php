<?php

namespace QBNK\QBank\API\Model;

class SlideStructure implements \JsonSerializable
{
    /** @var int Media that contains the slide */
    protected $mediaId;
    /** @var int Slide number, first slide is slide 0. */
    protected $slide;
    /** @var SlideTransition The transition to use when showing this slide */
    protected $transition;

    /**
     * Constructs a SlideStructure.
     *
     * @param array $parameters An array of parameters to initialize the {@link SlideStructure} with.
     *                          - <b>mediaId</b> - Media that contains the slide
     *                          - <b>slide</b> - Slide number, first slide is slide 0.
     *                          - <b>transition</b> - The transition to use when showing this slide
     */
    public function __construct($parameters = [])
    {
        if (isset($parameters['mediaId'])) {
            $this->setMediaId($parameters['mediaId']);
        }
        if (isset($parameters['slide'])) {
            $this->setSlide($parameters['slide']);
        }
        if (isset($parameters['transition'])) {
            $this->setTransition($parameters['transition']);
        }
    }

    /**
     * Gets the mediaId of the SlideStructure.
     * @return int	 */
    public function getMediaId()
    {
        return $this->mediaId;
    }

    /**
     * Sets the "mediaId" of the SlideStructure.
     *
     * @param int $mediaId
     *
     * @return SlideStructure
     */
    public function setMediaId($mediaId)
    {
        $this->mediaId = $mediaId;

        return $this;
    }

    /**
     * Gets the slide of the SlideStructure.
     * @return int	 */
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * Sets the "slide" of the SlideStructure.
     *
     * @param int $slide
     *
     * @return SlideStructure
     */
    public function setSlide($slide)
    {
        $this->slide = $slide;

        return $this;
    }

    /**
     * Gets the transition of the SlideStructure.
     * @return SlideTransition	 */
    public function getTransition()
    {
        return $this->transition;
    }

    /**
     * Sets the "transition" of the SlideStructure.
     *
     * @param SlideTransition $transition
     *
     * @return SlideStructure
     */
    public function setTransition($transition)
    {
        if ($transition instanceof SlideTransition) {
            $this->transition = $transition;
        } elseif (is_array($transition)) {
            $this->transition = new SlideTransition($transition);
        } else {
            $this->transition = null;
            trigger_error('Argument must be an object of class SlideTransition. Data loss!', E_USER_WARNING);
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

        if (null !== $this->mediaId) {
            $json['mediaId'] = $this->mediaId;
        }
        if (null !== $this->slide) {
            $json['slide'] = $this->slide;
        }
        if (null !== $this->transition) {
            $json['transition'] = $this->transition;
        }

        return $json;
    }
}
