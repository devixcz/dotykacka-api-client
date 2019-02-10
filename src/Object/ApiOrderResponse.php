<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class ApiOrderResponse extends ObjectBase
{
    /** @var Orderbean */
    public $order;

    /** @var int[] */
    public $receipts;

    public function __construct($data = null)
    {
        parent::__construct($data);

        if ($data) {
            if ($data['order']) {
                $this->order = new Orderbean($data['order']);
            }
        }
    }
}
