<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Employee;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class EmployeeService extends ServiceBase
{
    /**
     * @param int      $cloudId
     * @param Employee $employee
     *
     * @return Employee|Error
     */
    public function createEmployee($cloudId, Employee $employee)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/employee/'.$cloudId.'/create',
                array(),
                (string) $employee
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Employee($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Employee|Error
     */
    public function getEmployee($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/employee/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Employee($response);

        return $responseObject;
    }

    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Employee[]|Error
     */
    public function getAllEmployeesForCloud($cloudId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/employee/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Employee($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int      $cloudId
     * @param Employee $employee
     *
     * @return Employee|Error
     */
    public function updateEmployeeField($cloudId, Employee $employee)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/employee/'.$cloudId.'/'.$employee->userid.'/update',
                array(),
                (string) $employee
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Employee($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Employee|Error
     */
    public function deleteEmployee($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/employee/'.$cloudId.'/'.$id.'/delete'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Employee($response);

        return $responseObject;
    }
}
