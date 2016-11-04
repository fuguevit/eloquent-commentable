<?php

namespace Fuguevit\Commentable\Test;

use Fuguevit\Commentable\Comment;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CommentTest extends TestCase
{
    /**
     * Comment has a commentable relationship.
     */
    public function test_commentable_relationship()
    {
        $comment = new Comment();
        $this->assertInstanceOf(MorphTo::class, $comment->morphTo());
    }
}
