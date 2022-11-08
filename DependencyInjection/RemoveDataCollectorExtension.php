<?php

declare(strict_types=1);

namespace Manyou\RemoveDataCollectorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class RemoveDataCollectorExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter('remove_data_collector.services', $config['services']);
    }
}
