<?php
    namespace DotykackaPHPApiClient\Object;

    use DotykackaPHPApiClient\ObjectBase;

    class ApiProductSaleRequest extends ObjectBase {
        /** @var integer */
        public $cloudId;

        /** @var string */
        public $note;

        /** @var int */
        public $productid;

        /** @var double */
        public $quantity;

        /** @var int */
        public $warehouseid;

    }
    