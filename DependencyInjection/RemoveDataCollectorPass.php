<?php

declare(strict_types=1);

namespace Manyou\RemoveDataCollectorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RemoveDataCollectorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (! $container->hasParameter('remove_data_collector.services')) {
            return;
        }

        foreach ($container->getParameter('remove_data_collector.services') as $dataCollector) {
            if (! $container->hasDefinition($dataCollector)) {
                continue;
            }

            $definition = $container->getDefinition($dataCollector);

            $definition->clearTags();
        }

        $container->getParameterBag()->remove('remove_data_collector.services');
    }
}
