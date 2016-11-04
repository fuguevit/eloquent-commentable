<?php

namespace Fuguevit\Commentable\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Fuguevit\Commentable\Contracts\CommentInterface;
use Fuguevit\Commentable\Traits\CommentableTrait;

class Article extends Model implements CommentInterface
{
    use CommentableTrait;

    protected $table = 'articles';

    protected $fillable = ['title', 'body'];
}