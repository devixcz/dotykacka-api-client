<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Branch;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class BranchesService extends ServiceBase
{

    /**
     * @param int $cloudId
     * @param int $id
     *
     * @return Branch|Error
     */
    public function getBranch($cloudId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/branches/'.$cloudId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Branch($response);

        return $responseObject;
    }

    /**
     * @param int         $cloudId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Branch[]|Error
     */
    public function getAllBranchesForCloud($cloudId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/branches/'.$cloudId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Branch($item);
            $list[] = $responseObject;
        }

        return $list;
    }
}
