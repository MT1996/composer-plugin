<?php


namespace TheWorldsCMS\Composer;


use Composer\Installer\InstallerInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class ComposerInstaller extends LibraryInstaller implements InstallerInterface {

    public function getInstallPath(PackageInterface $package) {
        $this->io->write(var_dump($package));
        return parent::getInstallPath($package); // TODO: Change the autogenerated stub
    }


}