<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class Reservation extends ObjectBase
{
    /** @var int */
    public $STATUS_CANCELLED;

    /** @var int */
    public $STATUS_CONFIRMED;

    /** @var int */
    public $STATUS_NEW;

    /** @var int */
    public $branchid;

    /** @var int */
    public $cloudid;

    /** @var int */
    public $created;

    /** @var int */
    public $customerid;

    /** @var int */
    public $deleted;

    /** @var int */
    public $employeeid;

    /** @var int */
    public $enddate;

    /** @var int */
    public $flags;

    /** @var string */
    public $note;

    /** @var int */
    public $pgKey;

    /** @var int */
    public $reservationid;

    /** @var int */
    public $seats;

    /** @var int */
    public $serialVersionUID;

    /** @var int */
    public $startdate;

    /** @var int */
    public $status;

    /** @var int */
    public $tableid;

    /** @var string */
    public $taglist;

    /** @var int */
    public $versiondate;
}
