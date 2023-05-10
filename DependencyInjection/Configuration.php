<?php

declare(strict_types=1);

namespace Manyou\ClearServiceTagsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('clear_service_tags');

        $treeBuilder->getRootNode()
            ->fixXmlConfig('service')
            ->children()
                ->arrayNode('services')
                    ->scalarPrototype()->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
