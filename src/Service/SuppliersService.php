<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Supplier;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class SuppliersService extends ServiceBase
{
    /**
     * @param int      $cloudId
     * @param Supplier $supplier
     *
     * @return Supplier|Error
     */
    public function createSupplier($cloudId, Supplier $supplier)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/supplier/'.$cloudId.'/create',
                array(),
                (string) $supplier
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Supplier($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Supplier|Error
     */
    public function getSupplier($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/supplier/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Supplier($response);

        return $responseObject;
    }

    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Supplier[]|Error
     */
    public function getAllSuppliersForCloud($cloudId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/supplier/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Supplier($item);
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
    public function updateSupplierField($cloudId, Supplier $supplier)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/supplier/'.$cloudId.'/'.$supplier->supplierid.'/update',
                array(),
                (string) $supplier
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Supplier($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Supplier|Error
     */
    public function deleteSupplier($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/supplier/'.$cloudId.'/'.$id.'/delete'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Supplier($response);

        return $responseObject;
    }
}
