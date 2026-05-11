<?php

namespace App\Enums;

enum LandingPageTemplate: string
{
    case SingleService = 'single_service';
    case MultiService  = 'multi_service';

    public function label(): string
    {
        return match($this) {
            self::SingleService => 'Single Service',
            self::MultiService  => 'Multi Service',
        };
    }
}
