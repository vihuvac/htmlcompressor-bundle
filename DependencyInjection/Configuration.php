<?php

/**
 * This file is part of the HtmlCompressorBundle package.
 *
 * (c) Víctor Hugo Valle Castillo <victouk@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Vihuvac\Bundle\HtmlCompressorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Process\ExecutableFinder;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $finder      = new ExecutableFinder();

        $treeBuilder->root("html_compressor")
            ->children()
                ->booleanNode("enabled")->defaultTrue()->end()
                ->scalarNode("java")
                    ->defaultValue(
                        function() use($finder) {
                            return $finder->find("java", "/usr/bin/java");
                        }
                    )
                ->end()
                ->scalarNode("jar")
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->arrayNode("options")
                    ->normalizeKeys(false)
                    ->prototype("scalar")
                ->end()
            ->end();

        return $treeBuilder;
    }
}
