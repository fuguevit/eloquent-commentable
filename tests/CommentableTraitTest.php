<?php

namespace Fuguevit\Commentable\Test;

use Fuguevit\Commentable\Comment;
use Fuguevit\Commentable\Test\Models\Article;

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

    /**
     * Test all comments function returns collection.
     */
    public function test_all_comments_function_returns_collection()
    {
        $result = Article::allComments()->get();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $result);
    }
}
