<?php

namespace Database\Seeders;

use App\Enums\JobExperience;
use App\Enums\JobType;
use App\Models\JobPosting;
use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            ['title' => 'Shopify Developer',        'department' => 'Engineering', 'type' => JobType::FullTime,   'experience' => JobExperience::MidLevel, 'location' => 'Remote'],
            ['title' => 'WordPress Developer',       'department' => 'Engineering', 'type' => JobType::FullTime,   'experience' => JobExperience::Junior,   'location' => 'Remote'],
            ['title' => 'Digital Marketing Manager', 'department' => 'Marketing',   'type' => JobType::FullTime,   'experience' => JobExperience::Senior,   'location' => 'Mumbai, IN'],
            ['title' => 'Graphic Designer',          'department' => 'Design',      'type' => JobType::FullTime,   'experience' => JobExperience::MidLevel, 'location' => 'Remote'],
            ['title' => 'Content Writer',            'department' => 'Content',     'type' => JobType::Freelance,  'experience' => JobExperience::Any,      'location' => 'Remote'],
            ['title' => 'Copy Writer',               'department' => 'Content',     'type' => JobType::Freelance,  'experience' => JobExperience::Junior,   'location' => 'Remote'],
            ['title' => 'Proof Reader',              'department' => 'Content',     'type' => JobType::PartTime,   'experience' => JobExperience::Any,      'location' => 'Remote'],
            ['title' => 'Project Manager',           'department' => 'Operations',  'type' => JobType::FullTime,   'experience' => JobExperience::Senior,   'location' => 'Mumbai, IN'],
            ['title' => 'Social Media Manager',      'department' => 'Marketing',   'type' => JobType::FullTime,   'experience' => JobExperience::MidLevel, 'location' => 'Remote'],
            ['title' => 'Motion Graphics Designer',  'department' => 'Design',      'type' => JobType::Contract,   'experience' => JobExperience::MidLevel, 'location' => 'Remote'],
        ];

        foreach ($jobs as $job) {
            JobPosting::create([
                'title'       => $job['title'],
                'department'  => $job['department'],
                'type'        => $job['type']->value,
                'location'    => $job['location'],
                'experience'  => $job['experience']->value,
                'description' => 'We are looking for a talented ' . $job['title'] . ' to join our growing remote-first team. You will collaborate closely with our team to deliver high-quality work that drives real results for our clients. If you are passionate about your craft and want to work with ambitious brands, we would love to hear from you.',
                'is_active'   => true,
            ]);
        }
    }
}
