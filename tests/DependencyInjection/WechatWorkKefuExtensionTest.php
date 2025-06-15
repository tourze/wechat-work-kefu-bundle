<?php

namespace WechatWorkKefuBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use WechatWorkKefuBundle\DependencyInjection\WechatWorkKefuExtension;

class WechatWorkKefuExtensionTest extends TestCase
{
    public function testLoad_loadsServicesCorrectly(): void
    {
        $container = new ContainerBuilder();
        $extension = new WechatWorkKefuExtension();
        
        $extension->load([], $container);
        
        // 验证服务配置被加载
        // 由于当前没有实际定义的服务，我们只能验证扩展已经被加载
        $this->assertInstanceOf(WechatWorkKefuExtension::class, $extension);
        $this->assertNotEmpty($container->getResources());
    }
} 