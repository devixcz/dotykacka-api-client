<?php

namespace DotykackaPHPApiClient;

use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Uri;
use Http\Discovery\MessageFactoryDiscovery;

class ApiClient
{
    protected $apiBaseUrl = 'https://api.dotykacka.cz';
    protected $OAuth2Token;

    /**
     * @param string $token
     */
    public function setOAuth2Token($token)
    {
        $this->OAuth2Token = $token;
    }

    /**
     * @param string      $method
     * @param string      $path
     * @param array       $params
     * @param string|null $body
     * @param array       $files
     * @param string|null $username
     * @param string|null $password
     *
     * @return mixed|null
     */
    public function sendRequest(
            $method,
            $path,
            $params = array(),
            $body = null,
            $files = array(),
            $username = null,
            $password = null
    ) {
        $httpClient = HttpClientFactory::create(
                $this->OAuth2Token,
                $username,
                $password
        );

        $uri = new Uri($this->apiBaseUrl.'/'.$path);
        if ($files) {
            $contentType = 'multipart/form-data';
            $options = array();
            foreach ($files as $file) {
                $options[] = array(
                        'name' => $file['name'],
                        'headers' => array(
                                'Content-Type' => $file['mime'],
                        ),
                        'contents' => fopen(
                                $file['path'],
                                'r'
                        ),
                );
            }
            $body = new MultipartStream($options);
        } else {
            if ($params) {
                $params = http_build_query(
                        $params,
                        '',
                        '&'
                );
                if ($method == 'GET') {
                    $uri = $uri->withQuery($params);
                } else {
                    $body = $params;
                }
                $contentType = 'application/x-www-form-urlencoded';
            } else {
                $contentType = 'application/json';
            }
        }

        $factory = MessageFactoryDiscovery::find();
        $request = $factory->createRequest(
                $method,
                $uri,
                [
                        'Content-Type' => array($contentType),
                ],
                $body
        );

        $response = $httpClient->sendRequest($request);

        return json_decode(
                (string) $response->getBody(),
                true,
                512,
                JSON_BIGINT_AS_STRING
        );
    }
}
