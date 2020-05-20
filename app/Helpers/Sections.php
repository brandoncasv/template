<?php
namespace App\Helpers;

/**
 *
 */
class Sections
{
    public static function generate()
    {
        return [
            [
                'name' => __('app.pages.about'),
                'icon' => 'file-text',
                'url'  => ['blog-post.page', 'about'],
            ],
        ];
    }
}
