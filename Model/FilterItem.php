<?php

namespace QBNK\QBank\API\Model;

class FilterItem implements \JsonSerializable
{
    /** @var int ID of the Filter (only applicable if Category or Folder FilterItem) */
    protected $id;
    /** @var string Title */
    protected $title;
    /** @var int[] An array of mediaIds that are tagged with this title */
    protected $mediaIds;
    /** @var FilterItem[] */
    protected $filterItems;

    /**
     * Constructs a FilterItem.
     *
     * @param array $parameters An array of parameters to initialize the {@link FilterItem} with.
     *                          - <b>id</b> - ID of the Filter (only applicable if Category or Folder FilterItem)
     *                          - <b>title</b> - Title
     *                          - <b>mediaIds</b> - An array of mediaIds that are tagged with this title
     *                          - <b>filterItems</b> -
     */
    public function __construct($parameters = [])
    {
        $this->mediaIds = [];
        $this->filterItems = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['title'])) {
            $this->setTitle($parameters['title']);
        }
        if (isset($parameters['mediaIds'])) {
            $this->setMediaIds($parameters['mediaIds']);
        }
        if (isset($parameters['filterItems'])) {
            $this->setFilterItems($parameters['filterItems']);
        }
    }

    /**
     * Gets the id of the FilterItem.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the FilterItem.
     *
     * @param int $id
     *
     * @return FilterItem
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the title of the FilterItem.
     * @return string	 */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the "title" of the FilterItem.
     *
     * @param string $title
     *
     * @return FilterItem
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the mediaIds of the FilterItem.
     * @return int[]	 */
    public function getMediaIds()
    {
        return $this->mediaIds;
    }

    /**
     * Sets the "mediaIds" of the FilterItem.
     *
     * @param int[] $mediaIds
     *
     * @return FilterItem
     */
    public function setMediaIds(array $mediaIds)
    {
        $this->mediaIds = $mediaIds;

        return $this;
    }

    /**
     * Gets the filterItems of the FilterItem.
     * @return FilterItem[]	 */
    public function getFilterItems()
    {
        return $this->filterItems;
    }

    /**
     * Sets the "filterItems" of the FilterItem.
     *
     * @param FilterItem[] $filterItems
     *
     * @return FilterItem
     */
    public function setFilterItems(array $filterItems)
    {
        $this->filterItems = [];

        foreach ($filterItems as $item) {
            $this->addFilterItem($item);
        }

        return $this;
    }

    /**
     * Adds an object of "FilterItems" of the FilterItem.
     *
     * @param FilterItem|array $item
     *
     * @return FilterItem
     */
    public function addFilterItem($item)
    {
        if (!($item instanceof self)) {
            if (is_array($item)) {
                try {
                    $item = new self($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate FilterItem. ' . $e->getMessage(), E_USER_WARNING);
                }
            } else {
                trigger_error('Array parameter item is not of expected type "FilterItem"!', E_USER_WARNING);
            }
        }
        $this->filterItems[] = $item;

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
        if (null !== $this->title) {
            $json['title'] = $this->title;
        }
        if (null !== $this->mediaIds && !empty($this->mediaIds)) {
            $json['mediaIds'] = $this->mediaIds;
        }
        if (null !== $this->filterItems && !empty($this->filterItems)) {
            $json['filterItems'] = $this->filterItems;
        }

        return $json;
    }
}
