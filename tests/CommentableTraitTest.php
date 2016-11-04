<?php

namespace Fuguevit\Commentable\Test;

use Fuguevit\Commentable\Comment;
use Fuguevit\Commentable\Test\Models\Article;

class CommentableTraitTest extends TestCase
{
    /**
     * Test commentable trait can add comment
     */
    public function test_add_comment()
    {
        $article = $this->createArticle();
        $article->addComment(1,'foo','bar');

        $comment = Comment::where('user_id' , 1)->where('title', 'foo')->first();
        $this->assertInstanceOf('Fuguevit\Commentable\Comment', $comment);
    }

}