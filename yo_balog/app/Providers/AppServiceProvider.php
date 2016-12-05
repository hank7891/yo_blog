<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->blog_right_Bar();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * [right bar data].
     *
     * @return [Collection] [right bar data]
     */
    public function blog_right_Bar()
    {
        View()->composer('blog_right', function ($view) {
          $category_bar = \App\Model\Category::all();
          $tag_bar = \App\Model\Tag::all();
          $article_hot = \App\Model\Article::orderBy('click', 'DESC')->take(5)->get();
          $view->with(compact('category_bar','tag_bar','article_hot'));

      });
    }
}
