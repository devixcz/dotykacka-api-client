<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Ingrediencemap;
use DotykackaPHPApiClient\Object\Product;
use DotykackaPHPApiClient\Object\Receipt;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class ProductService extends ServiceBase
{
    /**
     * @param int      $cloudId
     * @param int      $warehouseId
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Product[]|Error
     */
    public function getAllProductsWithStockStatus($cloudId, $warehouseId, $limit = null, $offset = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId.'/'.$warehouseId.'/list',
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Product($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Receipt|Error
     */
    public function getProduct($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Product($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Product|Error
     */
    public function deleteProduct($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId.'/'.$id.'/delete'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Product($response);

        return $responseObject;
    }

    /**
     * @param int      $cloudId
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Product[]|Error
     */
    public function getAllProductsForCloud($cloudId, $limit = null, $offset = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Product($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int      $cloudId
     * @param int      $productId
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Ingrediencemap[]|Error
     */
    public function getAllIngredientsForProducts($cloudId, $productId, $limit = null, $offset = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId.'/'.$productId.'/ingredients',
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Ingrediencemap($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int      $cloudId
     * @param int      $productId
     * @param int      $warehouseId
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Ingrediencemap[]|Error
     */
    public function getAllIngredientsForProductsWithStockStatus(
            $cloudId,
            $productId,
            $warehouseId,
            $limit = null,
            $offset = null
    ) {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId.'/'.$productId.'/'.$warehouseId.'/ingredients',
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Ingrediencemap($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int     $cloudId
     * @param Product $product
     *
     * @return Product|Error
     */
    public function createProduct($cloudId, Product $product)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/product/'.$cloudId.'/create',
                array(),
                (string) $product
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Product($response);

        return $responseObject;
    }

    /**
     * @param int     $cloudId
     * @param Product $product
     *
     * @return Product|Error
     */
    public function updateProductField($cloudId, Product $product)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/product/'.$cloudId.'/'.$product->productid.'/update',
                array(),
                (string) $product
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Product($response);

        return $responseObject;
    }

    /**
     * @param int      $cloudId
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Ingrediencemap[]|Error
     */
    public function getAllIngredientsForCloud($cloudId, $limit = null, $offset = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId.'/ingredients',
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Ingrediencemap($item);
            $list[] = $responseObject;
        }

        return $list;
    }
}
