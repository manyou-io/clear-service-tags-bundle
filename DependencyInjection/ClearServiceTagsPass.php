<?php

declare(strict_types=1);

namespace Manyou\ClearServiceTagsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ClearServiceTagsPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (! $container->hasParameter('clear_service_tags.services')) {
            return;
        }

        foreach ($container->getParameter('clear_service_tags.services') as $dataCollector) {
            if (! $container->hasDefinition($dataCollector)) {
                continue;
            }

            $definition = $container->getDefinition($dataCollector);

            $definition->clearTags();
        }

        $container->getParameterBag()->remove('clear_service_tags.services');
    }
}
