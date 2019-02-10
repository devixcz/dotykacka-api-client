<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\AddItemRequest;
use DotykackaPHPApiClient\Object\Category;
use DotykackaPHPApiClient\Object\CreateOrderRequest;
use DotykackaPHPApiClient\Object\IssueOrderRequest;
use DotykackaPHPApiClient\Object\IssuePayOrderRequest;
use DotykackaPHPApiClient\Object\PayOrderRequest;
use DotykackaPHPApiClient\Object\UpdateOrderRequest;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class POSActionService extends ServiceBase
{
    /**
     * @param int                $cloudId
     * @param int                $branchId
     * @param CreateOrderRequest $createOrderRequest
     *
     * @return array|Error
     */
    public function createOrder($cloudId, $branchId, CreateOrderRequest $createOrderRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/action/'.$cloudId.'/'.$branchId.'/order/create',
                array(),
                (string) $createOrderRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }
    
    /**
     * @param int            $cloudId
     * @param int            $branchId
     * @param AddItemRequest $addItemRequest
     *
     * @return array|Error
     */
    public function addOrderItem($cloudId, $branchId, AddItemRequest $addItemRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/action/'.$cloudId.'/'.$branchId.'/order/add-item',
                array(),
                (string) $addItemRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }

    /**
     * @param int                $cloudId
     * @param int                $branchId
     * @param UpdateOrderRequest $updateOrderRequest
     *
     * @return array|Error
     */
    public function updateOrder($cloudId, $branchId, UpdateOrderRequest $updateOrderRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/action/'.$cloudId.'/'.$branchId.'/order/update',
                array(),
                (string) $updateOrderRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }
    
    /**
     * @param int               $cloudId
     * @param int               $branchId
     * @param IssueOrderRequest $issueOrderRequest
     *
     * @return array|Error
     */
    public function issueOrder($cloudId, $branchId, IssueOrderRequest $issueOrderRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/action/'.$cloudId.'/'.$branchId.'/order/issue',
                array(),
                (string) $issueOrderRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }
    
    /**
     * @param int                  $cloudId
     * @param int                  $branchId
     * @param IssuePayOrderRequest $issuePayOrderRequest
     *
     * @return array|Error
     */
    public function issuePayOrder($cloudId, $branchId, IssuePayOrderRequest $issuePayOrderRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/action/'.$cloudId.'/'.$branchId.'/order/issue-and-pay',
                array(),
                (string) $issuePayOrderRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }
    
    /**
     * @param int             $cloudId
     * @param int             $branchId
     * @param PayOrderRequest $payOrderRequest
     *
     * @return array|Error
     */
    public function payOrder($cloudId, $branchId, PayOrderRequest $payOrderRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/action/'.$cloudId.'/'.$branchId.'/order/pay',
                array(),
                (string) $payOrderRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }
}
