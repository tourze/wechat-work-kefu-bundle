<?php

namespace WechatWorkKefuBundle\Tests;

use PHPUnit\Framework\TestCase;
use WechatWorkKefuBundle\WechatWorkKefuBundle;

class WechatWorkKefuBundleTest extends TestCase
{
    public function testBundleInit_instantiatesCorrectly(): void
    {
        $bundle = new WechatWorkKefuBundle();

        $this->assertInstanceOf(WechatWorkKefuBundle::class, $bundle);
    }
}
