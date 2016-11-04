<?php

namespace Fuguevit\Commentable\Test;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Illuminate\Support\Facades\Schema;

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

}