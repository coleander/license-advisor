<?php
namespace LicenseAdvisor;


use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const VERSION = '0.1';
    protected $commands = [
        Commands\Check::class,
    ];

    protected $licenses = [
        Licenses\Apache20::class,
    ];

    public function __construct()
    {
        parent::__construct('License Advisor', self::VERSION);
        foreach($this->commands as $class){
            $this->add(new $class());
        }
    }
}
