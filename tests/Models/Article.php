<?php

namespace Fuguevit\Commentable\Test\Models;

use Fuguevit\Commentable\Contracts\CommentInterface;
use Fuguevit\Commentable\Traits\CommentableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements CommentInterface
{
    use CommentableTrait;

    protected $table = 'articles';

    protected $fillable = ['title', 'body'];
}
