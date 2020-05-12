<?php
namespace App\Helpers;

/**
 *
 */
class Pages
{
    public static function generate()
    {
        return [
            [
                'name' => __('app.pages.about'),
                'icon' => 'file-text',
                'url'  => ['blog-post.page', 'about'],
            ],
            [
                'name' => __('app.pages.faq'),
                'icon' => 'file-text',
                'url'  => ['blog-post.pages', 'faq'],
            ],
            [
                'name' => __('app.pages.privacy'),
                'icon' => 'file-text',
                'url'  => ['blog-post.page', 'privacy'],
            ],
            [
                'name' => __('app.pages.terms'),
                'icon' => 'file-text',
                'url'  => ['blog-post.page', 'terms'],
            ],
            [
                'name' => __('app.pages.news'),
                'icon' => 'file-text',
                'url'  => ['blog-post.blogs', 'news'],
            ],
        ];
    }
}
