<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class EETSubjectsSaleInfo extends ObjectBase
{
    /** @var int */
    public $id;

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
