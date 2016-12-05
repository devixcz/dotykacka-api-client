<?php
    namespace DotykackaPHPApiClient\Object;

    use DotykackaPHPApiClient\ObjectBase;

    class TagSaleInfo extends ObjectBase {
        /** @var string */
        public $name;

        /** @var double */
        public $purchaseValue;

        /** @var double */
        public $purchaseValueWithoutVAT;

        /** @var double */
        public $value;

        /** @var double */
        public $valueWithoutVAT;

    }
    