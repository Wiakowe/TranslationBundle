<?php
/**
 * Configuration.php
 * 
 * @package TranslationBundle 
 */
namespace Finday\TranslationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 * 
 * @author  Roger Llopart <roger@finday.com>
 *
 * @version Release:v.2.0.0
 */
class TranslationExtension extends Extension
{
	/**
		* {@inheritDoc}
		* 
		* @param Array            $configs   configs
		* @param ContainerBuilder $container container
		*/
	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		$loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
		$loader->load('services.xml');
	}
}
