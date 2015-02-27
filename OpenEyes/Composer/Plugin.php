<?php
/**
 * Created by PhpStorm.
 * User: petergallagher
 * Date: 27/02/15
 * Time: 12:55
 */

namespace OpenEyes\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;


class OpenEyesInstallerPlugin implements PluginInterface
{
	public function activate(Composer $composer, IOInterface $io)
	{
		$installer = new TemplateInstaller($io, $composer);
		$composer->getInstallationManager()->addInstaller($installer);
	}
}