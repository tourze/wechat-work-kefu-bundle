<?php

namespace WechatWorkKefuBundle\Enum;

use Tourze\EnumExtra\Itemable;
use Tourze\EnumExtra\ItemTrait;
use Tourze\EnumExtra\Labelable;
use Tourze\EnumExtra\Selectable;
use Tourze\EnumExtra\SelectTrait;

enum MessageType: string implements Labelable, Itemable, Selectable
{
    use ItemTrait;
    use SelectTrait;

    case TEXT = 'text';
    case IMAGE = 'image';
    case VOICE = 'voice';
    case VIDEO = 'video';
    case FILE = 'file';
    case LINK = 'link';
    case MINI_PROGRAM = 'miniprogram';
    case LOCATION = 'location';
    case MSG_MENU = 'msgmenu';

    public function getLabel(): string
    {
        return match ($this) {
            self::TEXT => '文本',
            self::IMAGE => '图片',
            self::VOICE => '语音',
            self::VIDEO => '视频',
            self::FILE => '文件',
            self::LINK => '图文链接',
            self::MINI_PROGRAM => '小程序卡片',
            self::LOCATION => '地理位置',
            self::MSG_MENU => '菜单',
        };
    }
}
