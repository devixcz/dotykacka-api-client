<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class ApiProductSaleRequest extends ObjectBase
{
    /** @var int */
    public $cloudId;

    /** @var string */
    public $note;

    /** @var int */
    public $productid;

    /** @var float */
    public $quantity;

    /** @var int */
    public $warehouseid;
}
