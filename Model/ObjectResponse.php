<?php

namespace QBNK\QBank\API\Model;

use DateTime;

/**
 * Value object for the ObjectAbstract response.
 */
abstract class ObjectResponse
{
    const DISCRIMINATOR_CATEGORY = 1;
    const DISCRIMINATOR_MEDIA = 2;
    const DISCRIMINATOR_FOLDER = 3;
    const DISCRIMINATOR_MOODBOARD = 4;
    const DISCRIMINATOR_DEPLOYMENTSITE = 5;
    const DISCRIMINATOR_SOCIALMEDIA = 6;
    const DISCRIMINATOR_CAMPAIGN = 7;

    /**
     * @var int The base Object identifier.
     */
    public $objectId;

    /**
     * @var date {@type DateTime} When the Object was created.
     */
    public $created;

    /**
     * @var int The identifier of the User who created the Object.
     */
    public $createdBy;

    /**
     * @var date {@type DateTime} When the Object was updated.
     */
    public $updated;

    /**
     * @var int Which user that updated the Object.
     */
    public $updatedBy;

    /**
     * @var bool Whether the object has been modified since constructed.
     */
    public $dirty;

    /**
     * @var array {@type \QBNK\QBank\Api\v1\Model\PropertySet} The objects PropertySets. This contains all properties with information and values. Use the "properties" parameter when setting properties.
     */
    public $propertySets;
}
