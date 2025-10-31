# WechatWorkKefuBundle

[English](README.md) | [中文](README.zh-CN.md)

A Symfony Bundle for WeChat Work (企业微信) Customer Service integration, providing message type definitions and utilities for handling WeChat Work customer service messages.

## Features

- Message type enumeration for WeChat Work customer service
- Support for all WeChat Work message types: text, image, voice, video, file, link, mini-program, location, and menu
- Integrated with Symfony's dependency injection container
- Provides labeled options for form building and UI components

## Installation

```bash
composer require tourze/wechat-work-kefu-bundle
```

## Quick Start

### 1. Register the Bundle

If you're using Symfony Flex (Symfony 4.0+), the bundle will be automatically registered. Otherwise, add it to your `config/bundles.php`:

```php
<?php

return [
    // ... other bundles
    WechatWorkKefuBundle\WechatWorkKefuBundle::class => ['all' => true],
];
```

### 2. Using Message Types

```php
<?php

use WechatWorkKefuBundle\Enum\MessageType;

// Get message type value
$textType = MessageType::TEXT->value; // 'text'
$imageType = MessageType::IMAGE->value; // 'image'

// Get Chinese label
$textLabel = MessageType::TEXT->getLabel(); // '文本'
$imageLabel = MessageType::IMAGE->getLabel(); // '图片'

// Use in forms or select options
$options = MessageType::genOptions();
// Returns array of options with 'value', 'label', 'text', 'name' keys

// Convert to array
$array = MessageType::TEXT->toArray();
// Returns ['value' => 'text', 'label' => '文本']

// Convert to select item
$item = MessageType::TEXT->toSelectItem();
// Returns ['value' => 'text', 'label' => '文本', 'text' => '文本', 'name' => '文本']
```

### 3. Available Message Types

| Enum Case | Value | Chinese Label |
|-----------|-------|---------------|
| `TEXT` | `text` | 文本 |
| `IMAGE` | `image` | 图片 |
| `VOICE` | `voice` | 语音 |
| `VIDEO` | `video` | 视频 |
| `FILE` | `file` | 文件 |
| `LINK` | `link` | 图文链接 |
| `MINI_PROGRAM` | `miniprogram` | 小程序卡片 |
| `LOCATION` | `location` | 地理位置 |
| `MSG_MENU` | `msgmenu` | 菜单 |

## Requirements

- PHP 8.1 or higher
- Symfony 6.4 or higher
- Doctrine ORM 3.0 or higher

## License

This bundle is under the MIT license. See the complete license in the [LICENSE](LICENSE) file.
