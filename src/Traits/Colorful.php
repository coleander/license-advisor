<?php

namespace LicenseAdvisor\Traits;

use Symfony\Component\Console\Output\OutputInterface;

trait Colorful
{
    public function green(OutputInterface $output, $text)
    {
        $output->writeln('<fg=green>'.$text.'</>');
    }

    public function yellow(OutputInterface $output, $text)
    {
        $output->writeln('<fg=yellow>'.$text.'</>');
    }

    public function red(OutputInterface $output, $text)
    {
        $output->writeln('<fg=red>'.$text.'</>');
    }
}
