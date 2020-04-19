<?php

namespace TheWorldsCMSComposerPlugin\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class ComposerInstallerPlugin implements PluginInterface {

    public function activate(Composer $composer, IOInterface $io) {
        $installer = new ComposerInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}