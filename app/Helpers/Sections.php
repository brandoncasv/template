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
                'name' => __('app.sections.testimony'),
                'icon' => 'file-text',
                'url'  => ['blog-post.blogs', 'testimonies'],
            ],
        ];
    }
}
