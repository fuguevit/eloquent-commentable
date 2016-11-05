<?php

namespace Fuguevit\Commentable\Contracts;

interface RemarkInterface
{
    /**
     * Return all remarks under the entity namespace.
     *
     * @return mixed
     */
    public static function allRemarks();

    /**
     * Return MorphToMany Relation of the entity.
     *
     * @return mixed
     */
    public function remarks();

    /**
     * Attach the given remark to the entity.
     *
     * @param $userId
     * @param $content
     *
     * @return mixed
     */
    public function addRemark($userId, $content);
}
