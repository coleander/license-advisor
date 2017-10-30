<?php
namespace LicenseAdvisor\Licenses;

use LicenseAdvisor\Abstracts\License;

/**
 * Proprietary.
 */
class Proprietary extends License
{
    public static function identifier():string
    {
        return 'Proprietary';
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
        return true;
    }

    public static function requiresStateChanges():bool
    {
        return true;
    }

    public static function requiresDisclosingSource():bool
    {
        return true;
    }

    public static function requriesSameLicense():bool
    {
        return true;
    }

    //Limitations
    public static function limitsLiability():bool
    {
        return true;
    }

    public static function limitsWarranty():bool
    {
        return true;
    }

    public static function limitsTrademarkUse():bool
    {
        return true;
    }
}
