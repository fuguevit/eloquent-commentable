<?php

namespace Fuguevit\Commentable\Contracts;

interface CommentInterface
{
    /**
     * Return all comments under the entity namespace.
     *
     * @return mixed
     */
    public static function allComments();

    /**
     * Return MorphToMany Relation of the entity.
     *
     * @return mixed
     */
    public function comments();

    /**
     * Attach the given comment to the entity.
     *
     * @param $userId
     * @param $title
     * @param $body
     * @param $parent_id
     *
     * @return mixed
     */
    public function addComment($userId, $title, $body, $parent_id = null);
}
