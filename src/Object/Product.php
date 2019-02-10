<?php

namespace DotykackaPHPApiClient\Object;

use DotykackaPHPApiClient\ObjectBase;

class Product extends ObjectBase
{
    /** @var int */
    public $TOTAL_ROWS;

    /** @var int */
    public $bitflags;

    /** @var string */
    public $canonicalname;

    /** @var int */
    public $categoryid;

    /** @var string */
    public $categorymargin;

    /** @var string */
    public $categoryname;

    /** @var int */
    public $cloudid;

    /** @var float */
    public $ctlgAmountId;

    /** @var int */
    public $ctlgBindType;

    /** @var float */
    public $ctlgItemId;

    /** @var string */
    public $currency;

    /** @var int */
    public $deleted;

    /** @var string */
    public $description;

    /** @var float */
    public $discountpercent;

    /** @var int */
    public $discountpermitted;

    /** @var int */
    public $display;

    /** @var string */
    public $dnids;

    /** @var string */
    public $ean;

    /** @var int */
    public $eetsubjectid;

    /** @var string */
    public $externalid;

    /** @var int */
    public $fiscalizationdisabled;

    /** @var string */
    public $hexcolor;

    /** @var int */
    public $ingredients;

    /** @var int */
    public $jointsale;

    /** @var bool */
    public $lastInventory;

    /** @var float */
    public $lastInventoryValue;

    /** @var float */
    public $lastpurchasepricewithoutvat;

    /** @var string */
    public $margin;

    /** @var int */
    public $marginmin;

    /** @var string */
    public $name;

    /** @var string */
    public $noteslist;

    /** @var string */
    public $numcanonicalname;

    /** @var int */
    public $onsale;

    /** @var float */
    public $packageitem;

    /** @var float */
    public $packaging;

    /** @var float */
    public $packagingmeasurement;

    /** @var int */
    public $permisions;

    /** @var int */
    public $pgKey;

    /** @var string */
    public $plu;

    /** @var float */
    public $points;

    /** @var float */
    public $priceVatCsv;

    /** @var float */
    public $pricewithoutvat;

    /** @var float */
    public $pricewithvat;

    /** @var int */
    public $productid;

    /** @var string */
    public $productidString;

    /** @var float */
    public $profitwithoutvat;

    /** @var float */
    public $purchasepricewithoutvat;

    /** @var float */
    public $purchasepricewithoutvat2;

    /** @var int */
    public $requirespriceentry;

    /** @var int */
    public $requiresquantityentry;

    /** @var int */
    public $serialVersionUID;

    /** @var int */
    public $sortorder;

    /** @var int */
    public $stockdeduct;

    /** @var string */
    public $stockoverdraft;

    /** @var float */
    public $stockquantity;

    /** @var float */
    public $stockquantitystatus;

    /** @var float */
    public $stockupQuantitySum;

    /** @var string */
    public $subtitle;

    /** @var int */
    public $supplierId;

    /** @var string */
    public $supplierproductcode;

    /** @var string */
    public $tagslist;

    /** @var int */
    public $takeawayitem;

    /** @var int */
    public $timeable;

    /** @var string */
    public $units;

    /** @var string */
    public $unitsmeasurement;

    /** @var float */
    public $vat;

    /** @var int */
    public $versiondate;

    /** @var Warehouse[] */
    public $warehouses;

    /** @var float */
    public $writeoffQuatitySum;
}
