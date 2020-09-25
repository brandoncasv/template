<?php
namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Sdkconsultoria\Blog\Models\BlogPost;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $posts = [
        [
          'identifier' => 'about',
          'title' => '',
          'subtitle' => '',
          'description' => '',
          'short_description' => '',
        ],
        [
          'identifier' => 'privacy',
          'title' => '',
          'subtitle' => '',
          'description' => '',
          'short_description' => '',
        ],
        [
          'identifier' => 'terms',
          'title' => '',
          'subtitle' => '',
          'description' => '',
          'short_description' => '',
        ]
      ];

      foreach ($posts as $key => $value) {
        $model             = new BlogPost;
        $model->status     = BlogPost::STATUS_ACTIVE;
        $model->identifier = $value['identifier'];
        $model->created_by = 1;
        $model->blog_id   = 2;
        $model->images_types = $model->blog->images_types;
        $model->sizes = $model->blog->sizes;
        $model->title = $value['title'];
        $model->subtitle = $value['subtitle'];
        $model->description = $value['description'];
        $model->short_description = $value['short_description'];
        $model->save();
      }
    }
}
