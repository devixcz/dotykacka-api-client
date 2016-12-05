<?php
    namespace DotykackaPHPApiClient\Object;

    use DotykackaPHPApiClient\ObjectBase;

    class ReceiptInfo extends ObjectBase {
        /** @var integer */
        public $count;

        /** @var string */
        public $type;

        /** @var double */
        public $value;

    }
    