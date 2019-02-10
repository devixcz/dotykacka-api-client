<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\ApiOrderResponse;
use DotykackaPHPApiClient\Object\Moneylog;
use DotykackaPHPApiClient\Object\Receipt;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class SalesService extends ServiceBase
{
    /**
     * @param int $cloudId
     * @param int $branchId
     *
     * @return array|Error
     */
    public function getBaseSalesReport($cloudId, $branchId)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/sales/report/'.$cloudId.'/'.$branchId
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
     * @param string|null $dateRange
     * @param string|null $dateField
     * @param string|null $sort
     *
     * @return ApiOrderResponse[]|Error
     */
    public function getAllOrdersForCloud($cloudId, $limit = null, $offset = null, $dateRange = null, $dateField = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'dateRange' => $dateRange,
                'dateField' => $dateField,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/order/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new ApiOrderResponse($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $dateRange
     * @param string|null $dateField
     * @param string|null $sort
     *
     * @return ApiOrderResponse[]|Error
     */
    public function getAllOpenOrdersForBranch($cloudId, $branchId, $limit = null, $offset = null, $dateRange = null, $dateField = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'dateRange' => $dateRange,
                'dateField' => $dateField,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/order-open/'.$cloudId.'/'.$branchId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new ApiOrderResponse($item);
            $list[] = $responseObject;
        }

        return $list;
    }
    
    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $dateRange
     * @param string|null $dateField
     * @param string|null $sort
     *
     * @return ApiOrderResponse[]|Error
     */
    public function getAllOrdersForBranch($cloudId, $branchId, $limit = null, $offset = null, $dateRange = null, $dateField = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'dateRange' => $dateRange,
                'dateField' => $dateField,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/order/'.$cloudId.'/'.$branchId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new ApiOrderResponse($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $dateRange
     * @param string|null $dateField
     * @param string|null $sort
     *
     * @return Receipt[]|Error
     */
    public function getAllReceiptsForCloud($cloudId, $limit = null, $offset = null, $dateRange = null, $dateField = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'dateRange' => $dateRange,
                'dateField' => $dateField,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/receipt/list/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Receipt($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $dateRange
     * @param string|null $dateField
     * @param string|null $sort
     *
     * @return Receipt[]|Error
     */
    public function getAllReceiptsForBranch($cloudId, $branchId, $limit = null, $offset = null, $dateRange = null, $dateField = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'dateRange' => $dateRange,
                'dateField' => $dateField,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/receipt/list/'.$cloudId.'/'.$branchId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Receipt($item);
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
    public function getReceiptById($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/receipt/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Receipt($response);

        return $responseObject;
    }

    /*
    **
     * @param int $cloudId
     * @param int $branchId
     * @param int $id
     *
     * @return ApiOrderResponse|Error
     */
    public function getOrderByIdForBranch($cloudId, $branchId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/order/'.$cloudId.'/'.$branchId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new ApiOrderResponse($response);

        return $responseObject;
    }
    
    /*
    **
     * @param int $cloudId
     * @param int $id
     *
     * @return ApiOrderResponse|Error
     */
    public function getOrderById($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/order/'.$cloudId.'/orderid/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new ApiOrderResponse($response);

        return $responseObject;
    }
    
    /*
    **
     * @param int $cloudId
     * @param int $branchId
     * @param int $id
     *
     * @return Moneylog|Error
     */
    public function getMonelogByIdForBranch($cloudId, $branchId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/moneylog/'.$cloudId.'/'.$branchId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Moneylog($response);

        return $responseObject;
    }
    
    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $dateRange
     * @param string|null $dateField
     * @param string|null $sort
     *
     * @return Moneylog[]|Error
     */
    public function getAllMoneylogsForBranch($cloudId, $branchId, $limit = null, $offset = null, $dateRange = null, $dateField = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'dateRange' => $dateRange,
                'dateField' => $dateField,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/moneylog/list/'.$cloudId.'/'.$branchId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Moneylog($item);
            $list[] = $responseObject;
        }

        return $list;
    }
    
    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $dateRange
     * @param string|null $dateField
     * @param string|null $sort
     *
     * @return Moneylog[]|Error
     */
    public function getAllMoneylogsForCloud($cloudId, $limit = null, $offset = null, $dateRange = null, $dateField = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'dateRange' => $dateRange,
                'dateField' => $dateField,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/moneylog/list/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Moneylog($item);
            $list[] = $responseObject;
        }

        return $list;
    }
    
    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param int|null    $limit
     * @param int|null    $offset
     *
     * @return array[]|Error
     */
    public function getAllShiftrangesForBranch($cloudId, $branchId, $limit = null, $offset = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/moneylog/shifts/'.$cloudId.'/'.$branchId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }
}
