<?php
namespace LicenseAdvisor;

class LicenseManager
{
    const DEFAULT_LICENSE = 'Proprietary';

    public static function licenses()
    {
        return [
            Licenses\Apache20::class,
            Licenses\MIT::class,
            Licenses\GPL3::class,
            Licenses\None::class,
            Licenses\Proprietary::class,
        ];
    }

    public static function default()
    {
        return self::license(self::DEFAULT_LICENSE);
    }

    public static function license($identifier)
    {
        foreach (static::licenses() as $license) {
            if ($license::identifier() == $identifier) {
                return new $license();
            }
        }
    }
}
