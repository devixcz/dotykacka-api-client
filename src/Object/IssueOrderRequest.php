<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class IssueOrderRequest extends ObjectBase
{
    /** @var string */
    public $action;

    /** @var int */
    public $order_id;

    /** @var string */
    public $print_config;

    /** @var string */
    public $print_email;

    /** @var string */
    public $print_type;

    /** @var string */
    public $webhook;
}
