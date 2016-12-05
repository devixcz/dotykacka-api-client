<?php
    namespace DotykackaPHPApiClient\Object;

    use DotykackaPHPApiClient\ObjectBase;

    class Branch extends ObjectBase {
        /** @var integer */
        public $branchid;

        /** @var string */
        public $canonicalname;

        /** @var integer */
        public $cloudid;
    
        /** @var string */
        public $config;

        /** @var int */
        public $created;

        /** @var integer */
        public $deleted;

        /** @var integer */
        public $display;

        /** @var integer */
        public $flags;

        /** @var string */
        public $gcmid;

        /** @var string */
        public $name;

        /** @var string */
        public $numcanonicalname;

        /** @var int */
        public $versiondate;

    }
    