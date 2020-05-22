<?php

namespace App\Http\Middleware;

use Closure;
use Sdkconsultoria\Blog\Models\Blog;

class Front
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $blogs = Blog::where('seoname', 'news')->first()->posts;
        // view()->share('blogs', $blogs);
        return $next($request);
    }
}
