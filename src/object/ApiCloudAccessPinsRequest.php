<?php
    namespace DotykackaPHPApiClient\Object;

    use DotykackaPHPApiClient\ObjectBase;

    class ApiCloudAccessPinsRequest extends ObjectBase {
        /** @var integer */
        public $branchId;
    
        /** @var integer */
        public $cloudId;

        /** @var string */
        public $controlString;

        /** @var int */
        public $date;

        /** @var int */
        public $userId;

    }
    