<?php

require_once __DIR__ . '/vendor/autoload.php';

$factory = new \DotykackaPHPApiClient\Factory();

/**
 * @var \DotykackaPHPApiClient\Service\OAuth2LoginService $service
 */
$service = $factory->service('OAuth2 Login Service');

$response = $service->getAPIToken(
        'demo@dotykacka.cz',
        'touchpo_84406',
        'touchpo'
);

var_dump($response);


$response = $service->getAPITokenLogin(
        'touchpo',
        'touchPo!2016api',
        $response->apiToken
);

var_dump($response);


/**
 * @var \DotykackaPHPApiClient\Service\CategoryService $service
 */
$service = $factory->service(
        'Category Service',
        $response->access_token
);

$response = $service->getAllCategoriesForCloud('342606595');

var_dump($response);


$response = $service->createCategory(
        '342606595',
        new \DotykackaPHPApiClient\Object\Category(array('name' => 'test'))
);

var_dump($response);


$response = $service->getCategory(
        '342606595',
        $response->categoryid
);

var_dump($response);


$response->name = 'test2';

$response = $service->updateCategoryField(
        '342606595',
        $response
);


var_dump($response);


$response = $service->deleteCategory(
        '342606595',
        $response->categoryid
);

var_dump($response);
