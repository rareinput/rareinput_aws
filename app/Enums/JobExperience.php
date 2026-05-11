<?php

namespace App\Enums;

enum JobExperience: string
{
    case Fresher  = 'Fresher (0–1 yrs)';
    case Junior   = 'Junior (1–3 yrs)';
    case MidLevel = 'Mid-level (3–5 yrs)';
    case Senior   = 'Senior (5+ yrs)';
    case Any      = 'Any';
}
