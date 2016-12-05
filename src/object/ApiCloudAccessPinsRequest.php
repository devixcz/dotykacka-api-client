<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class ApiCloudAccessPinsRequest extends ObjectBase
{
    /** @var int */
    public $branchId;

    /** @var int */
    public $cloudId;

    /** @var string */
    public $controlString;

    /** @var int */
    public $date;

    /** @var int */
    public $userId;
}
