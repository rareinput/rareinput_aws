<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case New         = 'New';
    case Reviewed    = 'Reviewed';
    case Shortlisted = 'Shortlisted';
    case Rejected    = 'Rejected';

    public function color(): string
    {
        return match($this) {
            self::New         => 'background-color:#dbeafe;color:#1e40af',
            self::Reviewed    => 'background-color:#fef9c3;color:#854d0e',
            self::Shortlisted => 'background-color:#dcfce7;color:#166534',
            self::Rejected    => 'background-color:#fee2e2;color:#991b1b',
        };
    }
}
