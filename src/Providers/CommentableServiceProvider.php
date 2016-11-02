<?php

namespace Fuguevit\Commentable\Providers;

use Illuminate\Support\ServiceProvider;

class CommentableServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([
           realpath(__DIR__.'/../../database/migrations') => database_path('migrations'),
        ], 'migrations');
        $this->publishes([
           realpath(__DIR__.'/../../config/comment.php') => config_path('comment.php'),
           realpath(__DIR__.'/../../config/remark.php')  => config_path('remark.php'),
        ], 'config');
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/comment.php'), 'comment');
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/remark.php'), 'remark');
    }
}
