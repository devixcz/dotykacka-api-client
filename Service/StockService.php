<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\ApiProductSaleRequest;
use DotykackaPHPApiClient\Object\Supplier;
use DotykackaPHPApiClient\Object\Warehouse;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class StockService extends ServiceBase
{
    /**
     * @param int $cloudId
     *
     * @return Warehouse[]|Error
     */
    public function getWarehouseList($cloudId)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/stock/'.$cloudId.'/list'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Warehouse($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int      $cloudId
     * @param Supplier $supplier
     *
     * @return Supplier|Error
     */
    public function createProductSale($cloudId, ApiProductSaleRequest $apiProductSaleRequest)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/supplier/'.$cloudId.'/create',
                array(),
                (string) $apiProductSaleRequest
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Supplier($response);

        return $responseObject;
    }

    /**
     * @param string $file
     *
     * @return Error|mixed|null
     */
    public function uploadDeliveryNote($file)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/stock/delivery-note/upload',
                array(),
                null,
                array(
                        'file' => array(
                                'name' => 'file',
                                'path' => $file,
                                'mime' => 'text/xml',
                        ),
                )
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        return $response;
    }
}
