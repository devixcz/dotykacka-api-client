<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class TagSaleInfo extends ObjectBase
{
    /** @var string */
    public $name;

    /** @var float */
    public $purchaseValue;

    /** @var float */
    public $purchaseValueWithoutVAT;

    /** @var float */
    public $value;

    /** @var float */
    public $valueWithoutVAT;
}
