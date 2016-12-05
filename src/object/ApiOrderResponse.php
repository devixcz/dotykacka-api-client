<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class ApiOrderResponse extends ObjectBase
{
    /** @var Orderbean */
    public $order;

    /** @var int[] */
    public $receipts;
}
