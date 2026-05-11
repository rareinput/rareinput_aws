<?php

namespace App\Enums;

enum LandingPageStatus: string
{
    case Draft     = 'draft';
    case Published = 'published';

    public function label(): string
    {
        return match($this) {
            self::Draft     => 'Draft',
            self::Published => 'Published',
        };
    }

    public function badgeStyle(): string
    {
        return match($this) {
            self::Draft     => 'background-color:#f3f4f6;color:#6b7280',
            self::Published => 'background-color:#dcfce7;color:#166534',
        };
    }
}
