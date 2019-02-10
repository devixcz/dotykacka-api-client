<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class OrderItem extends ObjectBase
{
    /** @var int */
    public $id;

    /** @var string */
    public $note;

    /** @var float */
    public $qty;

    /** @var string[] */
    public $tags;
}
