<?php

declare(strict_types=1);

namespace WechatWorkKefuBundle\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Tourze\PHPUnitSymfonyKernelTest\AbstractBundleTestCase;
use WechatWorkKefuBundle\WechatWorkKefuBundle;

/**
 * @internal
 */
#[CoversClass(WechatWorkKefuBundle::class)]
#[RunTestsInSeparateProcesses]
final class WechatWorkKefuBundleTest extends AbstractBundleTestCase
{
}
