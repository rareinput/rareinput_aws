<?php

namespace App\Enums;

enum JobType: string
{
    case FullTime   = 'Full-time';
    case PartTime   = 'Part-time';
    case Freelance  = 'Freelance';
    case Contract   = 'Contract';
    case Internship = 'Internship';
}
