<?php

namespace LicenseAdvisor;

class LicenseManager
{
    public static function licenses()
    {
        return [
            Licenses\Apache20::class,
            Licenses\MIT::class,
            Licenses\GPL3::class,
            Licenses\None::class,
        ];
    }

    public static function license($identifier)
    {
        foreach (static::licenses() as $license) {
            if ($license::identifier() === $identifier) {
                return new $license();
            }
        }
    }
}
