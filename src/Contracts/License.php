<?php
namespace LicenseAdvisor\Contracts;

/**
 * This what a license should implement
 */
interface License
{
    public function identifier(): string;

    //Permissions
    public function allowsCommercialUse(): boolean;
    public function allowsDistribution(): boolean;
    public function allowsModification(): boolean;
    public function allowsPrivateUse(): boolean;
    public function allowsPatentUse(): boolean;

    //Conditions
    public function requiresLicenseNotice(): boolean;
    public function requiresStateChanges(): boolean;
    public function requiresDisclosingSource(): boolean;
    public function requriesSameLicense(): boolean;

    //Limitations
    public function limitsLiability(): boolean;
    public function limitsWarranty(): boolean;
    public function limitsTrademarkUse(): boolean;
}
