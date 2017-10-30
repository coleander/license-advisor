<?php
namespace LicenseAdvisor\Licenses;

use LicenseAdvisor\Abstracts\License;

/**
 * Apache 2.0
 */
class Apache20 implements License
{
    public function identifier()
    {
        return "Apache 2.0";
    }

    //Permissions
    public function allowsCommercialUse()
    {
        return true;
    }
    public function allowsDistribution()
    {
        return true;
    }
    public function allowsModification()
    {
        return true;
    }
    public function allowsPrivateUse()
    {
        return true;
    }
    public function allowsPatentUse()
    {
        return true;
    }

    //Conditions
    public function requiresLicenseNotice()
    {
        return true;
    }
    public function requiresStateChanges()
    {
        return true;
    }
    public function requiresDisclosingSource()
    {
        return false;
    }
    public function requriesSameLicense()
    {
        return false;
    }

    //Limitations
    public function limitsLiability()
    {
        return true;
    }
    public function limitsWarranty()
    {
        return true;
    }
    public function limitsTrademarkUse()
    {
        return true;
    }
}
