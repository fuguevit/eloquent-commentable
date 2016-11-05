<?php

namespace Fuguevit\Commentable\Test;

use Fuguevit\Commentable\Comment;

class CommentableTraitTest extends TestCase
{
    /**
     * Test commentable trait can add comment.
     */
    public function test_add_comment_function_can_create_a_new_comment()
    {
        $article = $this->createArticle();
        $article->addComment(1, 'foo', 'bar');

        $comment = Comment::where('user_id', 1)->where('title', 'foo')->first();
        $this->assertInstanceOf('Fuguevit\Commentable\Comment', $comment);
    }

    /**
     * Test comments function returns morphMany.
     */
    public function test_comments_function_has_morph_many_relation_result()
    {
        $article  = $this->createArticle();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\MorphMany', $article->comments());
    }
}
