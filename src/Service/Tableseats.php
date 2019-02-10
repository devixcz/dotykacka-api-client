<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Tableseat;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class TableseatsService extends ServiceBase
{
    /*
    **
     * @param int $cloudId
     * @param int $branchId
     * @param int $id
     *
     * @return Tableseat|Error
     */
    public function getTableseatByIdForBranch($cloudId, $branchId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/tableseat/'.$cloudId.'/'.$branchId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Tableseat($response);

        return $responseObject;
    }
    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Tableseat[]|Error
     */
    public function getAllTableseatsForBranch($cloudId, $branchId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'     => $limit,
                'offset'    => $offset,
                'sort'      => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/tableseat/'.$cloudId.'/'.$branchId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Tableseat($item);
            $list[] = $responseObject;
        }

        return $list;
    }
}
