<?php

namespace WechatWorkKefuBundle\Tests\Enum;

use PHPUnit\Framework\Attributes\CoversClass;
use Tourze\PHPUnitEnum\AbstractEnumTestCase;
use WechatWorkKefuBundle\Enum\MessageType;

/**
 * @internal
 */
#[CoversClass(MessageType::class)]
final class MessageTypeTest extends AbstractEnumTestCase
{
    public function testEnumValuesAreCorrectlyDefined(): void
    {
        $this->assertSame('text', MessageType::TEXT->value);
        $this->assertSame('image', MessageType::IMAGE->value);
        $this->assertSame('voice', MessageType::VOICE->value);
        $this->assertSame('video', MessageType::VIDEO->value);
        $this->assertSame('file', MessageType::FILE->value);
        $this->assertSame('link', MessageType::LINK->value);
        $this->assertSame('miniprogram', MessageType::MINI_PROGRAM->value);
        $this->assertSame('location', MessageType::LOCATION->value);
        $this->assertSame('msgmenu', MessageType::MSG_MENU->value);
    }

    public function testGetLabelReturnsCorrectChineseLabel(): void
    {
        $this->assertSame('文本', MessageType::TEXT->getLabel());
        $this->assertSame('图片', MessageType::IMAGE->getLabel());
        $this->assertSame('语音', MessageType::VOICE->getLabel());
        $this->assertSame('视频', MessageType::VIDEO->getLabel());
        $this->assertSame('文件', MessageType::FILE->getLabel());
        $this->assertSame('图文链接', MessageType::LINK->getLabel());
        $this->assertSame('小程序卡片', MessageType::MINI_PROGRAM->getLabel());
        $this->assertSame('地理位置', MessageType::LOCATION->getLabel());
        $this->assertSame('菜单', MessageType::MSG_MENU->getLabel());
    }

    public function testItemTraitMethodsWorkCorrectly(): void
    {
        $item = MessageType::TEXT->toSelectItem();

        $this->assertArrayHasKey('label', $item);
        $this->assertArrayHasKey('value', $item);

        $this->assertSame('文本', $item['label']);
        $this->assertSame('text', $item['value']);

        $array = MessageType::TEXT->toArray();
        $this->assertArrayHasKey('value', $array);
        $this->assertArrayHasKey('label', $array);
        $this->assertSame('text', $array['value']);
        $this->assertSame('文本', $array['label']);
    }

    public function testSelectTraitMethodsWorkCorrectly(): void
    {
        $options = MessageType::genOptions();

        $this->assertCount(9, $options);

        foreach ($options as $option) {
            $this->assertArrayHasKey('label', $option);
            $this->assertArrayHasKey('value', $option);
        }

        // 确认至少一个具体的项目存在
        $textOption = null;
        foreach ($options as $option) {
            if ('text' === $option['value']) {
                $textOption = $option;
                break;
            }
        }

        $this->assertNotNull($textOption);
        $this->assertSame('文本', $textOption['label']);
        $this->assertSame('text', $textOption['value']);
    }

    public function testToArray(): void
    {
        $array = MessageType::TEXT->toArray();

        $this->assertArrayHasKey('value', $array);
        $this->assertArrayHasKey('label', $array);
        $this->assertSame('text', $array['value']);
        $this->assertSame('文本', $array['label']);

        // 测试其他枚举值
        $imageArray = MessageType::IMAGE->toArray();
        $this->assertSame('image', $imageArray['value']);
        $this->assertSame('图片', $imageArray['label']);
    }
}
