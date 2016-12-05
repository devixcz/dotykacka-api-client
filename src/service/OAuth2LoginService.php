<?php

namespace DotykackaPHPApiClient\Service;

use DotykackaPHPApiClient\Object\ApiOutsourceOAuthResponse;
use DotykackaPHPApiClient\Response\UserAccessInfo;
use DotykackaPHPApiClient\Response\UserAccessToken;
use DotykackaPHPApiClient\ServiceBase;

class OAuth2LoginService extends ServiceBase
{
    /**
     * @param string $username
     * @param string $password
     * @param int    $appid
     *
     * @return UserAccessInfo
     */
    public function getAPIToken($username, $password, $appid)
    {
        $params = array(
                'username' => $username,
                'password' => $password,
                'appid' => $appid,
        );

        $response = $this->apiClient->sendRequest(
                'POST',
                'oauth/get-apitoken',
                $params
        );

        $responseObject = new UserAccessInfo($response);

        return $responseObject;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $token
     *
     * @return UserAccessToken
     */
    public function getAPITokenLogin($username, $password, $token)
    {
        $params = array(
                'grant_type' => 'password',
                'username' => $token,
                'password' => '',
        );

        $response = $this->apiClient->sendRequest(
                'POST',
                'oauth/login/apitoken',
                $params,
                null,
                array(),
                $username,
                $password
        );

        $responseObject = new UserAccessToken($response);

        return $responseObject;
    }

    public function getLoginForOtherNetworks($branchName, $branchid, $email, $password, $serviceType, $token)
    {
        $body = array(
                'branchName' => $branchName,
                'branchid' => $branchid,
                'email' => $email,
                'password' => $password,
                'serviceType' => $serviceType,
                'token' => $token,
        );

        $response = $this->apiClient->sendRequest(
                'POST',
                'oauth/login/apitoken',
                array(),
                json_encode($body)
        );

        $responseObject = new ApiOutsourceOAuthResponse($response);

        return $responseObject;
    }
}
