<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class IssuePayOrderRequest extends ObjectBase
{
    /** @var string */
    public $action;

    /** @var int */
    public $order_id;

    /** @var int */
    public $payment_method_id;

    /** @var string */
    public $print_append;

    /** @var string */
    public $print_config;

    /** @var string */
    public $print_email;

    /** @var string */
    public $print_type;

    /** @var string */
    public $webhook;
}
