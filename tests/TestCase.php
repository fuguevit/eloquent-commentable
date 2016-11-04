<?php

namespace Fuguevit\Commentable\Test;

use Fuguevit\Commentable\Test\Models\Article;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate', [
            '--database' => 'testbench',
            '--realpath' => realpath(__DIR__.'/../database/migrations'),
        ]);

        Schema::create('articles', function ($table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->text('body');
        });
    }

    /**
     * {@inheritdoc}
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__.'/../src';
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            'Fuguevit\Commentable\Providers\CommentableServiceProvider',
        ];
    }

    /**
     * Creates a new article.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function createArticle()
    {
        return Article::create([
            'title' => 'foo',
            'body'  => 'bar',
        ]);
    }
}
