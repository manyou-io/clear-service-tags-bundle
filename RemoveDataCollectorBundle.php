<?php

declare(strict_types=1);

namespace Manyou\RemoveDataCollectorBundle;

use Manyou\RemoveDataCollectorBundle\DependencyInjection\RemoveDataCollectorPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RemoveDataCollectorBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        // Set priority > 0 to run before ProfilerPass
        // https://symfony.com/blog/new-in-symfony-3-2-compiler-passes-improvements#compiler-passes-priorities
        /** @see \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\ProfilerPass */
        $container->addCompilerPass(new RemoveDataCollectorPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1);
    }
}
