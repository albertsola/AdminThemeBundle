<?php

namespace Avanzu\AdminThemeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('avanzu_admin_theme');

        $rootNode->children()
                    ->scalarNode('bower_bin')
                        ->defaultValue('/usr/local/bin/bower')
                    ->end()
                    ->scalarNode('use_assetic')
                        ->defaultValue(true)
                    ->end()
                    ->scalarNode('use_twig')
                        ->defaultValue(true)
                    ->end()
                    ->arrayNode('options')
                        ->children()
                            ->scalarNode('skin')
                            ->defaultValue('skin-blue-light')
                        ->end()
                    ->end() // ->beforeNormalization()->castToArray()->end()
                ->end();
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
