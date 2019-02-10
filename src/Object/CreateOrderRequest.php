<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class CreateOrderRequest extends ObjectBase
{
    /** @var string */
    public $action;

    /** @var int */
    public $customer_id;

    /** @var int */
    public $table_id;

    /** @var int */
    public $user_id;

    /** @var string */
    public $webhook;
}
