<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class ApiIngredientMapRequest extends ObjectBase
{
    /** @var int */
    public $belongstoproductId;

    /** @var int */
    public $deleted;

    /** @var int */
    public $ingredienceproductId;

    /** @var int */
    public $quantity;

    /** @var string */
    public $units;
}
