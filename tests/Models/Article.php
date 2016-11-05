<?php

namespace Fuguevit\Commentable\Test\Models;

use Fuguevit\Commentable\Contracts\CommentInterface;
use Fuguevit\Commentable\Contracts\RemarkInterface;
use Fuguevit\Commentable\Traits\CommentableTrait;
use Fuguevit\Commentable\Traits\RemarkableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements CommentInterface, RemarkInterface
{
    use CommentableTrait, RemarkableTrait {

        CommentableTrait::getEntityClassName insteadof RemarkableTrait;
    }

    protected $table = 'articles';

    protected $fillable = ['title', 'body'];
}
