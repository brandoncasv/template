<?php
namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Sdkconsultoria\Blog\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $blogs = [
        [
          'title' => '',
          'description' => '',
        ],
      ];

      foreach ($blogs as $key => $blog) {
        $model         = new Blog;
        $model->status = Blog::STATUS_ACTIVE;
      }
    }
}
