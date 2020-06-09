<?php

namespace TheWorldsCMS\Composer;

use Composer\Installer\InstallerInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class ComposerInstaller extends LibraryInstaller implements InstallerInterface {

    private const VALIDPACKAGETYPENAME = "theworldscms-";

    private const INSTALLPATHS = array(
        "theworldscms-framework" => "./Packages/Framework",
        "theworldscms-app" => "./Packages/Application",
        "theworldscms-representation" => "./Packages/Representation"
    );

    // supports muss vorher geschrieben werden, da sonst nicht das Plugin richtig greift....
    public function getInstallPath(PackageInterface $package) {
        $packageType = $package->getType();
        $packageName = $package->getName();
        var_dump("Packagetype ist: '$packageType'");
        var_dump("PackageName ist: '$packageName'");
        if ($this->packageTypeIsValid($packageType)) {
            $installPath = self::INSTALLPATHS[$packageType];
            if ($installPath != null) {
                return $installPath;
            } else {
                return parent::getInstallPath($package);
            }
        } else {
            return parent::getInstallPath($package);
        }
    }

    public function supports($packageType) {
        var_dump("The Hell is going on here...", $packageType);
        return parent::supports($packageType);
    }

    private function packageTypeIsValid(string $packageType) {
        return preg_match("/^" . self::VALIDPACKAGETYPENAME . "/", $packageType) === 1;
    }
}