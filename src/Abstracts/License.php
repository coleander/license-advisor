<?php
namespace LicenseAdvisor\Abstracts;

use LicenseAdvisor\Contracts\License as ILicense;

/**
 * An abstraction of a license
 */
abstract class License implements ILicense
{
    private static $initialized = false;


    final public function compare(ILicense $license)
    {
        $reasons = [];
        //permissions
        if ($this->allowsCommercialUse() && !$license->allowsCommercialUse()) {
            $reasons[] = 'Commercial use';
        }
        if ($this->allowsDistribution() && !$license->allowsDistribution()) {
            $reasons[] = 'Distribution';
        }
        if ($this->allowsDistributionOverNetwork() && !$license->allowsDistributionOverNetwork()) {
            $reasons[] = 'Network Distribution';
        }
        if ($this->allowsModification() && !$license->allowsModification()) {
            $reasons[] = 'Modication';
        }
        if ($this->allowsPrivateUse() && !$license->allowsPrivateUse()) {
            $reasons[] = 'Private Use';
        }

        //Conditions
        if (!$this->requiresLicenseNotice() && $license->requiresLicenseNotice()) {
            $reasons[] = 'License Notice';
        }
        if (!$this->requiresStateChanges() && $license->requiresStateChanges()) {
            $reasons[] = 'State Changes';
        }
        if (!$this->requiresDisclosingSource() && $license->requiresDisclosingSource()) {
            $reasons[] = 'Disclosing Source';
        }
        if (!$this->requriesSameLicense() && $license->requriesSameLicense()) {
            $reasons[] = 'Same License';
        }

        //Limitations
        if (!$this->limitsLiability() && $license->limitsLiability()) {
            $reasons[] = 'Limited Liability';
        }
        if (!$this->limitsWarranty() && $license->limitsWarranty()) {
            $reasons[] = 'Limited Warranty';
        }
        if (!$this->limitsTrademarkUse() && $license->limitsTrademarkUse()) {
            $reasons[] = 'Limited Trademark Use';
        }

        return $reasons;
    }
}
