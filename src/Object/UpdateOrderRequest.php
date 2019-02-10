<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class UpdateOrderRequest extends ObjectBase
{
    /** @var string */
    public $action;

    /** @var int */
    public $customer_id;

    /** @var string */
    public $note;

    /** @var int */
    public $order_id;

    /** @var string */
    public $webhook;
}
