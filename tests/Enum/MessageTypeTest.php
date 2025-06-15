<?php

namespace WechatWorkKefuBundle\Tests\Enum;

use PHPUnit\Framework\TestCase;
use WechatWorkKefuBundle\Enum\MessageType;

class MessageTypeTest extends TestCase
{
    public function testEnumValues_areCorrectlyDefined(): void
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
    
    public function testGetLabel_returnsCorrectChineseLabel(): void
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
    
    public function testItemTraitMethods_workCorrectly(): void
    {
        $item = MessageType::TEXT->toSelectItem();
        
        $this->assertArrayHasKey('label', $item);
        $this->assertArrayHasKey('text', $item);
        $this->assertArrayHasKey('value', $item);
        $this->assertArrayHasKey('name', $item);
        
        $this->assertSame('文本', $item['label']);
        $this->assertSame('文本', $item['text']);
        $this->assertSame('text', $item['value']);
        $this->assertSame('文本', $item['name']);
        
        $array = MessageType::TEXT->toArray();
        $this->assertArrayHasKey('value', $array);
        $this->assertArrayHasKey('label', $array);
        $this->assertSame('text', $array['value']);
        $this->assertSame('文本', $array['label']);
    }
    
    public function testSelectTraitMethods_workCorrectly(): void
    {
        $options = MessageType::genOptions();
        
        $this->assertCount(9, $options);
        
        foreach ($options as $option) {
            $this->assertArrayHasKey('label', $option);
            $this->assertArrayHasKey('text', $option);
            $this->assertArrayHasKey('value', $option);
            $this->assertArrayHasKey('name', $option);
        }
        
        // 确认至少一个具体的项目存在
        $textOption = null;
        foreach ($options as $option) {
            if ($option['value'] === 'text') {
                $textOption = $option;
                break;
            }
        }
        
        $this->assertNotNull($textOption);
        $this->assertSame('文本', $textOption['label']);
        $this->assertSame('文本', $textOption['text']);
        $this->assertSame('text', $textOption['value']);
        $this->assertSame('文本', $textOption['name']);
    }
} 