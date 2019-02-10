<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class AddItemRequest extends ObjectBase
{
    /** @var string */
    public $action;

    /** @var OrderItem[] */
    public $items;

    /** @var int */
    public $order_id;

    /** @var string */
    public $webhook;
}
