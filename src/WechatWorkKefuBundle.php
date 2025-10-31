<?php

declare(strict_types=1);

namespace WechatWorkKefuBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tourze\BundleDependency\BundleDependencyInterface;
use WechatWorkBundle\WechatWorkBundle;

class WechatWorkKefuBundle extends Bundle implements BundleDependencyInterface
{
    public static function getBundleDependencies(): array
    {
        return [
            WechatWorkBundle::class => ['all' => true],
        ];
    }
}
