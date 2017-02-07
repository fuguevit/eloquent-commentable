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
    public function addComment($userId, $title, $body, $parent_id = null)
    {
        // when parent_id is null
        if (is_null($parent_id)) {
            $comment = $this->createCommentsModel()->create([
                'user_id' => $userId,
                'title'   => $title,
                'body'    => $body,
            ]);

            return $this->comments()->save($comment);
        }

        // when parent_id is not null
        $instance = new static();
        $parentComment = $instance->createCommentsModel()->find($parent_id);

        $comment = $this->createCommentsModel()->create([
            'user_id'       => $userId,
            'title'         => $title,
            'body'          => $body,
            'parent_id'     => $parent_id,
            'parent_path'   => $parentComment->parent_path.$parentComment->id.'/',
        ]);

        return $this->comments()->save($comment);
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
