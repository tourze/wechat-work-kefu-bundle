<?php

namespace WechatWorkKefuBundle\Tests\DependencyInjection;

use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tourze\PHPUnitSymfonyUnitTest\AbstractDependencyInjectionExtensionTestCase;
use WechatWorkKefuBundle\DependencyInjection\WechatWorkKefuExtension;

/**
 * @internal
 */
#[CoversClass(WechatWorkKefuExtension::class)]
final class WechatWorkKefuExtensionTest extends AbstractDependencyInjectionExtensionTestCase
{
    public function testLoadLoadsServicesCorrectly(): void
    {
        // 创建扩展实例测试其功能
        $extension = new WechatWorkKefuExtension();
        $container = new ContainerBuilder();

        // 设置必需的内核参数
        $container->setParameter('kernel.environment', 'test');

        // 测试扩展加载功能
        $extension->load([], $container);

        // 验证扩展类实例化正常
        $this->assertInstanceOf(WechatWorkKefuExtension::class, $extension);

        // 验证容器加载了配置资源
        $this->assertNotEmpty($container->getResources());

        // 验证扩展的别名符合预期
        $this->assertEquals('wechat_work_kefu', $extension->getAlias());
    }

    protected function provideServiceDirectories(): iterable
    {
        // 该包目前只包含 Enum 类，没有需要自动注册的服务目录
        return [];
    }

    public function testNoServiceDirectoriesExpected(): void
    {
        // 验证该包确实不需要注册任何服务目录
        $directories = iterator_to_array($this->provideServiceDirectories());
        $this->assertEmpty($directories, '该包不应该包含需要自动注册的服务目录');
    }
}
