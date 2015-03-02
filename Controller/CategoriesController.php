<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\Model\Category;
use QBNK\QBank\API\Model\CategoryResponse;

class CategoriesController extends ControllerAbstract
{
    /**
     * Lists all Categories.
     *
     * Lists all categories that the current user has access to.
     *
     * @return Category[]
     */
    public function listCategories()
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/categories', $parameters);
        foreach ($result as &$entry) {
            $entry = new Category($entry);
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
     * @param int $id The Category identifier.
     *
     * @return Category
     */
    public function retrieveCategory($id)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/categories/'.$id.'', $parameters);
        $result = new Category($result);

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
            'query'   => [],
            'body'    => json_encode(['category' => $category]),
            'headers' => [],
        ];
        $result = $this->post('v1/categories', $parameters);
        $result = new CategoryResponse($result);

        return $result;
    }
    /**
     * Update a Category.
     *
     * @param int $id The Category identifier.
     * @param Category $category A JSON encoded Category representing the updates
     *
     * @return CategoryResponse
     */
    public function updateCategory($id, Category $category)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['category' => $category]),
            'headers' => [],
        ];
        $result = $this->post('v1/categories/'.$id.'', $parameters);
        $result = new CategoryResponse($result);

        return $result;
    }
    /**
     * Delete a Category.
     *
     * You can not delete a category that has Media attached to it.
     *
     * @param int $id The Category identifier.
     *
     * @return CategoryResponse
     */
    public function removeCategory($id)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->delete('v1/categories/'.$id.'', $parameters);
        $result = new CategoryResponse($result);

        return $result;
    }
}
