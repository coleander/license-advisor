<?php

namespace LicenseAdvisor\Contracts;

/**
 * This what a license should implement.
 */
interface License
{
    public static function identifier(): string;

    //Permissions
    public static function allowsCommercialUse(): bool;

    public static function allowsDistribution(): bool;

    public static function allowsDistributionOverNetwork(): bool;

    public static function allowsModification(): bool;

    public static function allowsPrivateUse(): bool;

    //Conditions
    public static function requiresLicenseNotice(): bool;

    public static function requiresStateChanges(): bool;

    public static function requiresDisclosingSource(): bool;

    public static function requriesSameLicense(): bool;

    //Limitations
    public static function limitsLiability(): bool;

    public static function limitsWarranty(): bool;

    public static function limitsTrademarkUse(): bool;
}
