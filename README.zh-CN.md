# WechatWorkKefuBundle

[English](README.md) | [中文](README.zh-CN.md)

用于企业微信客服集成的 Symfony Bundle，提供消息类型定义和处理企业微信客服消息的工具。

## 功能特性

- 企业微信客服消息类型枚举
- 支持所有企业微信消息类型：文本、图片、语音、视频、文件、链接、小程序、地理位置和菜单
- 集成 Symfony 依赖注入容器
- 提供带标签的选项，用于构建表单和 UI 组件

## 安装

```bash
composer require tourze/wechat-work-kefu-bundle
```

## 快速开始

### 1. 注册 Bundle

如果你使用 Symfony Flex（Symfony 4.0+），Bundle 会自动注册。否则，将其添加到 `config/bundles.php`：

```php
<?php

return [
    // ... 其他 bundles
    WechatWorkKefuBundle\WechatWorkKefuBundle::class => ['all' => true],
];
```

### 2. 使用消息类型

```php
<?php

use WechatWorkKefuBundle\Enum\MessageType;

// 获取消息类型值
$textType = MessageType::TEXT->value; // 'text'
$imageType = MessageType::IMAGE->value; // 'image'

// 获取中文标签
$textLabel = MessageType::TEXT->getLabel(); // '文本'
$imageLabel = MessageType::IMAGE->getLabel(); // '图片'

// 用于表单或选择选项
$options = MessageType::genOptions();
// 返回包含 'value', 'label', 'text', 'name' 键的选项数组

// 转换为数组
$array = MessageType::TEXT->toArray();
// 返回 ['value' => 'text', 'label' => '文本']

// 转换为选择项
$item = MessageType::TEXT->toSelectItem();
// 返回 ['value' => 'text', 'label' => '文本', 'text' => '文本', 'name' => '文本']
```

### 3. 可用的消息类型

| 枚举值 | 值 | 中文标签 |
|--------|-----|----------|
| `TEXT` | `text` | 文本 |
| `IMAGE` | `image` | 图片 |
| `VOICE` | `voice` | 语音 |
| `VIDEO` | `video` | 视频 |
| `FILE` | `file` | 文件 |
| `LINK` | `link` | 图文链接 |
| `MINI_PROGRAM` | `miniprogram` | 小程序卡片 |
| `LOCATION` | `location` | 地理位置 |
| `MSG_MENU` | `msgmenu` | 菜单 |

## 系统要求

- PHP 8.1 或更高版本
- Symfony 6.4 或更高版本
- Doctrine ORM 3.0 或更高版本

## 许可证

本 Bundle 基于 MIT 许可证。完整许可证请参阅 [LICENSE](LICENSE) 文件。
