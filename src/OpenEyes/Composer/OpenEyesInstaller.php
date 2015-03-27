<?php
/**
 * Created by PhpStorm.
 * User: petergallagher
 * Date: 27/02/15
 * Time: 12:55
 */

namespace OpenEyes\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;


class OpenEyesInstaller extends LibraryInstaller
{
	/**
	 * {@inheritDoc}
	 */
	public function getPackageBasePath(PackageInterface $package)
	{
		$prefix = substr($package->getPrettyName(), 0, 9);
		if ('openeyes/' !== $prefix) {
			throw new \InvalidArgumentException(
				'Unable to install template, openeyes modules '
				.'should always start their package name with '
				.'"openeyes/"'
			);
		}

		if($package->getPrettyName() === $prefix.'eyedraw')
		{
			return 'protected/modules/' . str_replace($prefix,'',$package->getPrettyName());
		}

		return 'protected/modules/' . str_replace(' ', '', ucwords(str_replace(array($prefix, '-'),array('', ' '), $package->getPrettyName())));
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return 'openeyes-module' === $packageType;
	}
}