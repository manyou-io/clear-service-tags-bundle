<?php

declare(strict_types=1);

namespace Manyou\ClearServiceTagsBundle;

use Manyou\ClearServiceTagsBundle\DependencyInjection\ClearServiceTagsPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ClearServiceTagsBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        // Set priority > 0 to run before ProfilerPass
        // https://symfony.com/blog/new-in-symfony-3-2-compiler-passes-improvements#compiler-passes-priorities
        /** @see \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\ProfilerPass */
        $container->addCompilerPass(new ClearServiceTagsPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1);
    }
}
