# README #
  
# Requirements  
  
software:  
  * php 5.5  
    
php settings:  
  * Set the "date.timezone" setting in php.ini* (like Europe/Paris).  
  
# Getting Started
##Install via Composer

1\. Create a file named **composer.json** in the root of your project and add the following code to it:

```
{  
  "require": {  
    "dotykacka/php-api-client": "*"  
  },  
  "minimum-stability": "dev"  
}
```

2\. Install Composer
```bash
curl -sS https://getcomposer.org/installer | php
```

3\. Run composer install:
```bash
composer.phar install
```

# Usage

## Getting Started

```
<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $factory = new \DotykackaPHPApiClient\Factory();

    /**
     * @var \DotykackaPHPApiClient\Service\OAuth2LoginService $service
     */
    $service = $factory->service( 'OAuth2 Login Service' );

    $response = $service->getAPIToken(
            'demo@dotykacka.cz',
            'touchpo_84406',
            'touchpo'
    );

    var_dump( $response );

    
    $response = $service->getAPITokenLogin(
            'touchpo',
            'touchPo!2016api',
            $response->apiToken
    );

    var_dump( $response );


    /**
     * @var \DotykackaPHPApiClient\Service\CategoryService $service
     */
    $service = $factory->service(
            'Category Service',
            $response->access_token
    );

    $response = $service->getAllCategoriesForCloud( '342606595' );

    var_dump( $response );


    $response = $service->createCategory(
            '342606595',
            new \DotykackaPHPApiClient\Object\Category(
                    array( 'name' => 'test' )
            )
    );

    var_dump( $response );


    $response = $service->getCategory(
            '342606595',
            $response->categoryid
    );

    var_dump( $response );

    
    $response->name = 'test2';

    $response = $service->updateCategoryField(
            '342606595',
            $response
    );

    var_dump( $response );

    
    $response = $service->deleteCategory(
            '342606595',
            $response->categoryid
    );

    var_dump( $response );
```