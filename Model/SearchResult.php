<?php

namespace QBNK\QBank\API\Model;

class SearchResult implements \JsonSerializable, \Countable, \Iterator, \ArrayAccess
{
    /**
     * @var ObjectResponse[] An array of Media matching the search
     */
    protected $results;

    /** @var int Number of hits per page in the SearchResult */
    protected $limit;
    /** @var int Starting position of SearchResult */
    protected $offset;
    /** @var float Time spent searching */
    protected $timeSearching;
    /** @var int Total number of hits */
    protected $totalHits;

    /**
     * Constructs a SearchResult.
     *
     * @param array $parameters An array of parameters to initialize the {@link SearchResult} with.
     *                          - <b>limit</b> - Number of hits per page in the SearchResult
     *                          - <b>offset</b> - Starting position of SearchResult
     *                          - <b>timeSearching</b> - Time spent searching
     *                          - <b>totalHits</b> - Total number of hits
     *                          - <b>results</b> - The results of this search
     */
    public function __construct($parameters = [])
    {
        $this->results = [];

        if (isset($parameters['results'])) {
            $this->setResults($parameters['results']);
        }

        if (isset($parameters['limit'])) {
            $this->setLimit($parameters['limit']);
        }
        if (isset($parameters['offset'])) {
            $this->setOffset($parameters['offset']);
        }
        if (isset($parameters['timeSearching'])) {
            $this->setTimeSearching($parameters['timeSearching']);
        }
        if (isset($parameters['totalHits'])) {
            $this->setTotalHits($parameters['totalHits']);
        }
    }

    /**
     * Gets the limit of the SearchResult.
     * @return int	 */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets the "limit" of the SearchResult.
     *
     * @param int $limit
     *
     * @return SearchResult
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Gets the offset of the SearchResult.
     * @return int	 */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Sets the "offset" of the SearchResult.
     *
     * @param int $offset
     *
     * @return SearchResult
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Gets the timeSearching of the SearchResult.
     * @return float	 */
    public function getTimeSearching()
    {
        return $this->timeSearching;
    }

    /**
     * Sets the "timeSearching" of the SearchResult.
     *
     * @param float $timeSearching
     *
     * @return SearchResult
     */
    public function setTimeSearching($timeSearching)
    {
        $this->timeSearching = $timeSearching;

        return $this;
    }

    /**
     * Gets the totalHits of the SearchResult.
     * @return int	 */
    public function getTotalHits()
    {
        return $this->totalHits;
    }

    /**
     * Sets the "totalHits" of the SearchResult.
     *
     * @param int $totalHits
     *
     * @return SearchResult
     */
    public function setTotalHits($totalHits)
    {
        $this->totalHits = $totalHits;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->results);
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->results);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return key($this->results);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        next($this->results);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        reset($this->results);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return null !== $this->key();
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->results[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->results[$offset] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        if (null === $offset) {
            $this->results[] = $value;
        } else {
            $this->results[$offset] = $value;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->results[$offset]);
    }

    /**
     * Gets the results of the SearchResult.
     *
     * @return ObjectResponse[]
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Sets the "results" of the SearchResult.
     *
     * @param \QBNK\QBank\Api\Model\ObjectResponse[] $results
     *
     * @return SearchResult
     */
    public function setResults(array $results)
    {
        $this->results = [];

        foreach ($results as $item) {
            /** $item ObjectResponse */
            switch ($item['discriminatorId']) {
                case ObjectResponse::DISCRIMINATOR_FOLDER:
                    $this->addFolderResponse($item);

                    break;

                case ObjectResponse::DISCRIMINATOR_MEDIA:
                default:
                    $this->addMediaResponse($item);

                    break;
            }
        }

        return $this;
    }

    /**
     * Adds an object of "MediaResponse" of the SearchResult.
     *
     * @param MediaResponse|array $item
     *
     * @return SearchResult
     */
    public function addMediaResponse($item)
    {
        if (!($item instanceof MediaResponse)) {
            if (is_array($item)) {
                try {
                    $item = new MediaResponse($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate MediaResponse. ' . $e->getMessage(), E_USER_WARNING);
                }
            } elseif (!is_numeric($item)) {
                trigger_error('Array parameter item is not of expected type "MediaResponse"!', E_USER_WARNING);
            }
        }
        $this->results[] = $item;

        return $this;
    }

    /**
     * Adds an object of "FolderResponse" of the SearchResult.
     *
     * @param FolderResponse|array $item
     *
     * @return SearchResult
     */
    public function addFolderResponse($item)
    {
        if (!($item instanceof FolderResponse)) {
            if (is_array($item)) {
                try {
                    $item = new FolderResponse($item);
                } catch (\Exception $e) {
                    trigger_error('Could not auto-instantiate FolderResponse. ' . $e->getMessage(), E_USER_WARNING);
                }
            } elseif (!is_numeric($item)) {
                trigger_error('Array parameter item is not of expected type "FolderResponse"!', E_USER_WARNING);
            }
        }
        $this->results[] = $item;

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

        if (null !== $this->limit) {
            $json['limit'] = $this->limit;
        }
        if (null !== $this->offset) {
            $json['offset'] = $this->offset;
        }
        if (null !== $this->timeSearching) {
            $json['timeSearching'] = $this->timeSearching;
        }
        if (null !== $this->totalHits) {
            $json['totalHits'] = $this->totalHits;
        }

        if (null !== $this->results && !empty($this->results)) {
            $json['results'] = $this->results;
        }

        return $json;
    }
}
