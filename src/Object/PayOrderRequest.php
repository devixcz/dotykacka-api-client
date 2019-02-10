<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class PayOrderRequest extends ObjectBase
{
    /** @var string */
    public $action;

    /** @var int */
    public $order_id;

    /** @var int */
    public $payment_method_id;

    /** @var string */
    public $webhook;
}
