<?php

namespace WechatWorkKefuBundle\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class WechatWorkKefuBundleIntegrationTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return IntegrationTestKernel::class;
    }
    
    public function testBundle_isCorrectlyIntegrated(): void
    {
        self::bootKernel();
        
        /** @var ContainerInterface $container */
        $container = self::getContainer();
        
        // 验证内核是否正确引导
        $this->assertTrue($container->hasParameter('kernel.bundles'));
        
        // 验证是否正确注册了WechatWorkKefuBundle
        $bundles = $container->getParameter('kernel.bundles');
        $this->assertArrayHasKey('WechatWorkKefuBundle', $bundles);
    }
} 