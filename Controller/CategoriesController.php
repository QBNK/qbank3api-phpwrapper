<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\Category;
use QBNK\QBank\API\Model\CategoryResponse;

class CategoriesController extends ControllerAbstract
{
    /**
     * Lists all Categories.
     *
     * Lists all categories that the current user has access to.
     *
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return CategoryResponse[]
     */
    public function listCategories(CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/categories', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new CategoryResponse($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific Category.
     *
     * Fetches a Category by the specified identifier.
     *
     * @param int         $id          the Category identifier
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return CategoryResponse
     */
    public function retrieveCategory($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/categories/' . $id . '', $parameters, $cachePolicy);
        $result = new CategoryResponse($result);

        return $result;
    }

    /**
     * Create a Category.
     *
     * @param Category $category A JSON encoded Category to create
     *
     * @return CategoryResponse
     */
    public function createCategory(Category $category)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['category' => $category], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/categories', $parameters);
        $result = new CategoryResponse($result);

        return $result;
    }

    /**
     * Update a Category.
     *
     * @param int      $id       the Category identifier
     * @param Category $category A JSON encoded Category representing the updates
     *
     * @return CategoryResponse
     */
    public function updateCategory($id, Category $category)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['category' => $category], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/categories/' . $id . '', $parameters);
        $result = new CategoryResponse($result);

        return $result;
    }

    /**
     * Delete a Category.
     *
     * You can not delete a category that has Media attached to it.
     *
     * @param int $id the Category identifier
     *
     * @return CategoryResponse
     */
    public function removeCategory($id)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/categories/' . $id . '', $parameters);
        $result = new CategoryResponse($result);

        return $result;
    }
}
