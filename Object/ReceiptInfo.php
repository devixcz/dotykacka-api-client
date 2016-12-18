<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class ReceiptInfo extends ObjectBase
{
    /** @var int */
    public $count;

    /** @var string */
    public $type;

    /** @var float */
    public $value;
}
