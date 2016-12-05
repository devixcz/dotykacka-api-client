<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class ApiOutsourceOAuthResponse extends ObjectBase
{
    /** @var int */
    public $cloudid;

    /** @var object */
    public $company;

    /** @var string */
    public $status;

    /** @var int */
    public $userId;
}
