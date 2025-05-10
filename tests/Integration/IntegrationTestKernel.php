<?php

namespace WechatWorkKefuBundle\Tests\Integration;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use WechatWorkKefuBundle\WechatWorkKefuBundle;

class IntegrationTestKernel extends Kernel
{
    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new DoctrineBundle(),
            new WechatWorkKefuBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__ . '/config/config.yaml');
    }
    
    public function getCacheDir(): string
    {
        return sys_get_temp_dir() . '/wechat_work_kefu_bundle/cache';
    }
    
    public function getLogDir(): string
    {
        return sys_get_temp_dir() . '/wechat_work_kefu_bundle/log';
    }
} 