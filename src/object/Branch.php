<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class Branch extends ObjectBase
{
    /** @var int */
    public $branchid;

    /** @var string */
    public $canonicalname;

    /** @var int */
    public $cloudid;

    /** @var string */
    public $config;

    /** @var int */
    public $created;

    /** @var int */
    public $deleted;

    /** @var int */
    public $display;

    /** @var int */
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
