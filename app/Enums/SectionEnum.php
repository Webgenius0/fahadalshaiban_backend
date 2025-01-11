<?php

namespace App\Enums;

enum SectionEnum: string
{
    const BG = 'bg_image';

    case HOME_BANNER = 'home_banner';
    case HOME_BANNERS = 'home_banners';


    // Home page section
    public static function getHome()
    {
        return [
            self::HOME_BANNER->value => ['item' => 1, 'type' => 'first'],
            self::HOME_BANNERS->value => ['item' => 3, 'type' => 'get']
        ];
    }
}
