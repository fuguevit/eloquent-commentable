<?php

namespace Fuguevit\Commentable\Traits;

trait CommentableTrait
{
    /**
     * {@inheritdoc}
     */
    public static function allComments()
    {
        $instance = new static();

        return $instance->createCommentsModel()->whereCommentableType(
            $instance->getEntityClassName()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function comments()
    {
        return $this->morphMany(config('comment.comment_model'), 'commentable');
    }

    /**
     * {@inheritdoc}
     */
    public function addComment($userId, $title, $body)
    {
        $comment = $this->createCommentsModel()->create([
            'user_id'   => $userId,
            'title'     => $title,
            'body'      => $body,
        ]);
        $this->comments()->attach($comment);
    }

    /**
     * Create comments model.
     *
     * @return mixed
     */
    protected static function createCommentsModel()
    {
        $commentModel = config('comment.comment_model');

        return new $commentModel();
    }

    /**
     * Return the entity class name.
     *
     * @return mixed
     */
    protected function getEntityClassName()
    {
        if (isset(static::$entityNamespace)) {
            return static::$entityNamespace;
        }

        return $this->comments()->getMorphClass();
    }
}
