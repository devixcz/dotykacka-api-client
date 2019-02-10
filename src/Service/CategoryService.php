<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Category;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class CategoryService extends ServiceBase
{
    /**
     * @param int      $cloudId
     * @param Category $category
     *
     * @return Category|Error
     */
    public function createCategory($cloudId, Category $category)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/category/'.$cloudId.'/create',
                array(),
                (string) $category
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Category($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Category|Error
     */
    public function getCategory($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/category/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Category($response);

        return $responseObject;
    }

    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Category[]|Error
     */
    public function getAllCategoriesForCloud($cloudId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/category/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Category($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int      $cloudId
     * @param Category $category
     *
     * @return Category|Error
     */
    public function updateCategoryField($cloudId, Category $category)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/category/'.$cloudId.'/'.$category->categoryid.'/update',
                array(),
                (string) $category
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Category($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Category|Error
     */
    public function deleteCategory($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/category/'.$cloudId.'/'.$id.'/delete'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Category($response);

        return $responseObject;
    }
}
