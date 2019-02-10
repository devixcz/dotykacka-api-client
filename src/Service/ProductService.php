<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\ApiIngredientMapRequest;
use DotykackaPHPApiClient\Object\IngredientsMap;
use DotykackaPHPApiClient\Object\Product;
use DotykackaPHPApiClient\Object\Stockstatus;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class ProductService extends ServiceBase
{
    /**
     * @param int         $cloudId
     * @param int         $warehouseId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Product[]|Error
     */
    public function getAllProductsWithStockStatus($cloudId, $warehouseId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
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
     * @return Product|Error
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
     * @param int $warehouseid
     * @param int $id
     *
     * @return Product|Error
     */
    public function getProductWithStockstatus($cloudId, $warehouseid, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/withstockstatus/'.$cloudId.'/'.$warehouseid.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Product($response);

        return $responseObject;
    }
    
    /**
     * @param int $cloudId
     * @param int $warehouseid
     * @param int $id
     *
     * @return Stockstatus|Error
     */
    public function getProductStockstatus($cloudId, $warehouseid, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/stockstatus/'.$cloudId.'/'.$warehouseid.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Stockstatus($response);

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
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Product[]|Error
     */
    public function getAllProductsForCloud($cloudId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
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
     * @param int         $cloudId
     * @param int         $productId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return IngredientsMap[]|Error
     */
    public function getAllIngredientsForProducts($cloudId, $productId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
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
            $responseObject = new IngredientsMap($item);
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
     * @return IngredientsMap[]|Error
     */
    public function getAllIngredientsForProductsWithStockStatus(
            $cloudId,
            $productId,
            $warehouseId,
            $limit = null,
            $offset = null,
            $sort = null
    ) {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
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
            $responseObject = new IngredientsMap($item);
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
     * @param int                     $cloudId
     * @param ApiIngredientMapRequest $apiIngredientMapRequest
     *
     * @return array|Error
     */
    public function createUpdateIngredientForProduct($cloudId, ApiIngredientMapRequest $apiIngredientMapRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/product/'.$cloudId.'/ingredients/edit',
                array(),
                (string) $apiIngredientMapRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }

    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return IngredientsMap[]|Error
     */
    public function getAllIngredientsForCloud($cloudId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
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
            $responseObject = new IngredientsMap($item);
            $list[] = $responseObject;
        }

        return $list;
    }
    
    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return IngredientsMap|Error
     */
    public function deleteIngredientProduct($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/product/'.$cloudId.'/ingredients/'.$id.'/delete'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new IngredientsMap($response);

        return $responseObject;
    }
}
