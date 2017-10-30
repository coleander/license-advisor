<?php

namespace LicenseAdvisor\Commands;

use Composer\Factory as ComposerFactory;
use Composer\IO\NullIO;
use LicenseAdvisor\LicenseManager;
use LicenseAdvisor\Traits\Colorful;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class Check extends Command
{
    use Colorful;

    const COMMAND_NAME = 'check';

    public function __construct()
    {
        parent::__construct();

        $this->configure();
    }

    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDefinition(
                [
                    new InputOption('license', 'l', InputOption::VALUE_REQUIRED, 'Your package license', LicenseManager::default()),

                ]
            )
            ->setDescription('Checks your depdendencies against your license.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $licenses = LicenseManager::licenses();
        $selectedLicense = LicenseManager::license($input->getOption('license'));

        if (is_null($selectedLicense)) {
            $this->red($output, $input->getOption('license').' is an unsupported license.');

            return;
        }

        $output->writeln('Your license: '.$selectedLicense::identifier());

        $hadErrors = false;

        foreach ($this->readLicenses() as $packageLicense => $packages) {
            $license = LicenseManager::license($packageLicense);
            if (is_null($license)) {
                $this->yellow($output, 'Unknown License: '.$packageLicense);
                continue;
            }

            $compare = $selectedLicense->compare($license);
            if (empty($compare)) {
                $this->green($output, '✔ ' . $license);
            } else {
                $hadErrors = true;
                $this->red($output, '✖ '. $license);
                $this->red($output, 'Problems:');
                foreach ($compare as $reason) {
                    $this->red($output, ' - '.$reason);
                }

                $this->red($output, 'Packages using ' . $license . ': ');
                foreach ($packages as $package) {
                    $this->red($output, ' - '.$reason);
                }
            }
        }

        exit($hadErrors ? 2 : 0);
    }

    protected function readLicenses()
    {
        $factory = new ComposerFactory();
        $composer = $factory->create(new NullIO());
        $packages = $composer->getRepositoryManager()->getLocalRepository()->getPackages();

        $licenses = [];
        foreach ($packages as $package) {
            foreach ($package->getLicense() as $license) {
                if (!isset($licenses[$license])) {
                    $licenses[$license] = [];
                }
                $licenses[$license][] = $package->getName();
            }
        }

        return $licenses;
    }
}
