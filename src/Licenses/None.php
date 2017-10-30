<?php

namespace LicenseAdvisor\Licenses;

use LicenseAdvisor\Abstracts\License;

/**
 * Copyright.
 */
class None extends License
{
    public static function identifier():string
    {
        return 'None';
    }

    //Permissions
    public static function allowsCommercialUse():bool
    {
        return true;
    }

    public static function allowsDistribution():bool
    {
        return true;
    }

    public static function allowsDistributionOverNetwork():bool
    {
        return true;
    }

    public static function allowsModification():bool
    {
        return true;
    }

    public static function allowsPrivateUse():bool
    {
        return true;
    }

    //Conditions
    public static function requiresLicenseNotice():bool
    {
        return false;
    }

    public static function requiresStateChanges():bool
    {
        return false;
    }

    public static function requiresDisclosingSource():bool
    {
        return false;
    }

    public static function requriesSameLicense():bool
    {
        return false;
    }

    //Limitations
    public static function limitsLiability():bool
    {
        return false;
    }

    public static function limitsWarranty():bool
    {
        return false;
    }

    public static function limitsTrademarkUse():bool
    {
        return false;
    }
}
