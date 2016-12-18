<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Warehouse;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class WarehouseService extends ServiceBase
{
    /**
     * @param int       $cloudId
     * @param Warehouse $warehouse
     *
     * @return Warehouse|Error
     */
    public function createWarehouse($cloudId, Warehouse $warehouse)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/warehouse/'.$cloudId.'/create',
                array(),
                (string) $warehouse
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Warehouse($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Warehouse|Error
     */
    public function getWarehouse($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/warehouse/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Warehouse($response);

        return $responseObject;
    }

    /**
     * @param int      $cloudId
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Warehouse[]|Error
     */
    public function getAllWarehousesForCloud($cloudId, $limit = null, $offset = null)
    {
        $params = array(
                'limit' => $limit,
                'offset' => $offset,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/warehouse/'.$cloudId,
                $params
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
     * @param int       $cloudId
     * @param Warehouse $warehouse
     *
     * @return Warehouse|Error
     */
    public function updateWarehouseField($cloudId, Warehouse $warehouse)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/warehouse/'.$cloudId.'/'.$warehouse->warehouseid.'/update',
                array(),
                (string) $warehouse
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Warehouse($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Warehouse|Error
     */
    public function deleteWarehouse($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/warehouse/'.$cloudId.'/'.$id.'/delete'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Warehouse($response);

        return $responseObject;
    }
}
