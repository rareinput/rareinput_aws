<?php

namespace App\Models;

use App\Enums\LandingPageStatus;
use App\Enums\LandingPageTemplate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandingPage extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'template',
        'status',
        'content',
        'meta_title',
        'meta_description',
        'og_image',
    ];

    protected function casts(): array
    {
        return [
            'template' => LandingPageTemplate::class,
            'status'   => LandingPageStatus::class,
            'content'  => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (LandingPage $page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->name);
            }
        });
    }

    public function isPublished(): bool
    {
        return $this->status === LandingPageStatus::Published;
    }

    /**
     * Returns content merged with template defaults.
     * All keys guaranteed present — no null checks needed in Blade.
     */
    public function resolvedContent(): array
    {
        return array_replace_recursive(
            self::defaults($this->template),
            $this->content ?? []
        );
    }

    public static function defaults(LandingPageTemplate $template): array
    {
        return match ($template) {
            LandingPageTemplate::SingleService => self::singleServiceDefaults(),
            LandingPageTemplate::MultiService  => self::multiServiceDefaults(),
        };
    }

    private static function singleServiceDefaults(): array
    {
        return [
            'nav' => [
                'cta_text' => 'Book Free Call',
            ],
            'hero' => [
                'badge'          => '',
                'headline_line1' => '',
                'headline_line2' => '',
                'headline_line3' => '',
                'subheadline'    => '',
                'primary_cta'    => 'Get a Free Audit',
                'secondary_cta'  => 'See Our Work',
                'secondary_url'  => '',
                'stats'          => [
                    ['value' => '', 'label' => ''],
                    ['value' => '', 'label' => ''],
                    ['value' => '', 'label' => ''],
                    ['value' => '', 'label' => ''],
                ],
            ],
            'problem' => [
                'headline'    => '',
                'subheadline' => '',
                'problems'    => [],
            ],
            'services' => [
                'headline'    => '',
                'subheadline' => '',
                'services'    => [],
            ],
            'process' => [
                'headline'    => '',
                'subheadline' => '',
                'steps'       => [],
            ],
            'testimonials' => [
                'headline'     => '',
                'testimonials' => [],
            ],
            'why_us' => [
                'headline'    => '',
                'subheadline' => '',
                'reasons'     => [],
                'stats'       => [],
            ],
            'form' => [
                'headline'        => 'Get a Free Audit — No Strings Attached',
                'subheadline'     => '',
                'checklist_items' => [],
                'trust_tags'      => [],
                'form_subject'    => '',
                'dropdown_label'  => 'What\'s Your Main Challenge?',
                'dropdown_options' => [],
            ],
            'faq' => [
                'faqs' => [],
            ],
            'final_cta' => [
                'headline'    => '',
                'subheadline' => '',
                'button_text' => 'Get My Free Audit',
            ],
            'colors' => [
                'background'      => '#0f172a',
                'accent'          => '#7c3aed',
                'accent_text'     => '#ffffff',
                'heading_text'    => '#ffffff',
                'body_text'       => 'rgba(255,255,255,0.55)',
                'card_background' => 'rgba(255,255,255,0.03)',
                'card_border'     => 'rgba(255,255,255,0.08)',
            ],
        ];
    }

    private static function multiServiceDefaults(): array
    {
        return [
            'nav' => [
                'cta_text' => 'Claim My Discount',
            ],
            'urgency_banner' => [
                'text' => '',
            ],
            'hero' => [
                'badge'              => '',
                'headline'           => '',
                'subheadline'        => '',
                'cta_text'           => 'Claim My Discount',
                'countdown_end_date' => '',
            ],
            'trust_badges' => [
                'badges' => [],
            ],
            'services' => [
                'headline'    => '',
                'subheadline' => '',
                'discount_badge' => '',
                'services'    => [],
            ],
            'testimonials' => [
                'headline'     => '',
                'testimonials' => [],
            ],
            'process' => [
                'headline' => '',
                'steps'    => [],
            ],
            'form' => [
                'headline'     => '',
                'subheadline'  => '',
                'form_subject' => '',
            ],
            'faq' => [
                'faqs' => [],
            ],
            'final_cta' => [
                'headline'    => '',
                'subheadline' => '',
                'button_text' => 'Claim My Discount Now',
            ],
            'colors' => [
                'background'      => '#1a1512',
                'accent'          => '#e8a838',
                'accent_text'     => '#1a1512',
                'heading_text'    => '#ffffff',
                'body_text'       => 'rgba(255,255,255,0.65)',
                'card_background' => 'rgba(255,255,255,0.04)',
                'card_border'     => 'rgba(232,168,56,0.2)',
            ],
        ];
    }
}
