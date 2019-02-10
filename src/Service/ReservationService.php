<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\Reservation;
use DotykackaPHPApiClient\Response\Error;
use DotykackaPHPApiClient\ServiceBase;

class ReservationService extends ServiceBase
{
    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param Reservation $reservation
     *
     * @return Reservation|Error
     */
    public function createReservation($cloudId, $branchId, Reservation $reservation)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/reservation/'.$cloudId.'/'.$branchId.'/create',
                array(),
                (string) $reservation
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Reservation($response);

        return $responseObject;
    }

    /**
     * @param int         $cloudId
     * @param int         $branchId
     *
     * @return Reservation|Error
     */
    public function getReservation($cloudId, $branchId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/reservation/'.$cloudId.'/'.$branchId.'/'.$id
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Reservation($response);

        return $responseObject;
    }

    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param int|null    $limit
     * @param int|null    $offset
     * @param string|null $sort
     *
     * @return Reservation[]|Error
     */
    public function getAllReservationsForCloud($cloudId, $branchId, $limit = null, $offset = null, $sort = null)
    {
        $params = array(
                'limit'  => $limit,
                'offset' => $offset,
                'sort'   => $sort,
        );

        $response = $this->apiClient->sendRequest(
                'GET',
                'api/reservation/'.$cloudId.'/'.$branchId,
                $params
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $list = array();

        foreach ($response as $item) {
            $responseObject = new Reservation($item);
            $list[] = $responseObject;
        }

        return $list;
    }

    /**
     * @param int         $cloudId
     * @param int         $branchId
     * @param Reservation $reservation
     *
     * @return Reservation|Error
     */
    public function updateReservationField($cloudId, $branchId, Reservation $reservation)
    {
        $response = $this->apiClient->sendRequest(
                'POST',
                'api/reservation/'.$cloudId.'/'.$branchId.'/'.$reservation->reservationid.'/update',
                array(),
                (string) $reservation
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Reservation($response);

        return $responseObject;
    }

    /**
     * @param int $cloudId
     * @param int $branchId
     * @param int $id
     *
     * @return Reservation|Error
     */
    public function deleteReservation($cloudId, $branchId, $id)
    {
        $response = $this->apiClient->sendRequest(
                'GET',
                'api/reservation/'.$cloudId.'/'.$branchId.'/'.$id.'/delete'
        );

        if (isset($response['error'])) {
            return new Error($response['error']);
        }

        $responseObject = new Reservation($response);

        return $responseObject;
    }
}
