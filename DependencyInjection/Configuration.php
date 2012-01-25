<?php
/**
 * Configuration.php
 * 
 * @package TranslationBundle 
 */
namespace Finday\TranslationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 * 
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 * 
 * @author  Roger Llopart <roger@finday.com>
 *
 * @version Release:v.2.0.0
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
		 * 
		 * @return Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $tree_builder = new TreeBuilder();
        $root_node = $tree_builder->root('translation');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $tree_builder;
    }
}
