<?php

namespace DotykackaPHPApiClient\Response;

use DotykackaPHPApiClient\ObjectBase;

class UserAccessToken extends ObjectBase
{
    public $access_token;
    public $token_type;
    public $expires_in;
    public $scope;
}
