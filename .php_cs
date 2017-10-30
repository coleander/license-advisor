<?php

return PhpCsFixer\Config::create()
->setFinder(PhpCsFixer\Finder::create()->in(__DIR__.'/src'))
->setUsingCache(false)
->setIndent('    ')
->setRules([
    '@PSR2' => true,
]);
