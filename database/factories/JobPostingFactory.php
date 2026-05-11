<?php

namespace Database\Factories;

use App\Enums\JobExperience;
use App\Enums\JobType;
use App\Models\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobPosting>
 */
class JobPostingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => fake()->randomElement([
                'Shopify Developer', 'WordPress Developer', 'Digital Marketing Manager',
                'Graphic Designer', 'Content Writer', 'Copy Writer', 'Proof Reader',
                'Project Manager', 'Social Media Manager', 'Motion Graphics Designer',
            ]),
            'department'  => fake()->randomElement(['Engineering', 'Marketing', 'Design', 'Operations', 'Content']),
            'type'        => fake()->randomElement(JobType::cases())->value,
            'location'    => fake()->randomElement(['Remote', 'Mumbai, IN', 'Hybrid — Mumbai', 'Delhi, IN']),
            'experience'  => fake()->randomElement(JobExperience::cases())->value,
            'description' => fake()->paragraph(3),
            'is_active'   => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }
}
