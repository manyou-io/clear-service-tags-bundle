<?php

declare(strict_types=1);

namespace Manyou\ClearServiceTagsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class ClearServiceTagsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter('clear_service_tags.services', $config['services']);
    }
}
