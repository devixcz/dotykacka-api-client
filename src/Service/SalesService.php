<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\ApiOrderResponse;
use DotykackaPHPApiClient\Object\Receipt;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class SalesService extends ServiceBase
{
    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $dateRange
     *
     * @return ApiOrderResponse[]|Error
     */
    public function getAllOrdersForCloud($cloudId, $limit = null, $offset = null, $dateRange = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
                'dateRange' => $dateRange,
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
     *
     * @return ApiOrderResponse[]|Error
     */
    public function getAllOrdersForBranch($cloudId, $branchId, $limit = null, $offset = null, $dateRange = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
                'dateRange' => $dateRange,
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
     *
     * @return Receipt[]|Error
     */
    public function getAllReceiptsForCloud($cloudId, $limit = null, $offset = null, $dateRange = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
                'dateRange' => $dateRange,
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
     *
     * @return Receipt[]|Error
     */
    public function getAllReceiptsForBranch($cloudId, $branchId, $limit = null, $offset = null, $dateRange = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
                'dateRange' => $dateRange,
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
    public function getOrderById($cloudId, $branchId, $id)
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
}
