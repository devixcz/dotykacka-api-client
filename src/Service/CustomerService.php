<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Customer;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class CustomerService extends ServiceBase
{
    /**
     * @param int      $cloudId
     * @param Customer $customer
     *
     * @return Customer|Error
     */
    public function createCustomer($cloudId, Customer $customer)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/customer/'.$cloudId.'/create',
                array(),
                (string) $customer
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Customer($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Customer|Error
     */
    public function getCustomer($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/customer/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Customer($response);

        return $responseObject;
    }

    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Customer[]|Error
     */
    public function getAllCustomersForCloud($cloudId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/customer/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Customer($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int      $cloudId
     * @param Customer $customer
     *
     * @return Customer|Error
     */
    public function updateCustomerField($cloudId, Customer $customer)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/customer/'.$cloudId.'/'.$customer->customerid.'/update',
                array(),
                (string) $customer
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Customer($response);

        return $responseObject;
    }

    /**
     * @param int       $cloudId
     * @param int       $id
     * @param bool|null $anonymize
     *
     * @return Customer|Error
     */
    public function deleteCustomer($cloudId, $id, $anonymize = null)
    {
        $params = array(
                'anonymize'  => $anonymize,
        );
        
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/customer/'.$cloudId.'/'.$id.'/delete',
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Customer($response);

        return $responseObject;
    }
}
