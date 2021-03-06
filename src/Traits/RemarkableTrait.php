<?php

namespace Fuguevit\Commentable\Traits;

trait RemarkableTrait
{
    /**
     * {@inheritdoc}
     */
    public static function allRemarks()
    {
        $instance = new static();

        return $instance->createRemarksModel()->whereRemarkableType(
            $instance->getEntityClassName()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function remarks()
    {
        return $this->morphMany(config('remark.remark_model'), 'remarkable');
    }

    /**
     * {@inheritdoc}
     */
    public function addRemark($userId, $content)
    {
        $remark = $this->createRemarksModel()->create([
            'user_id'   => $userId,
            'content'   => $content,
        ]);
        $this->remarks()->save($remark);
    }

    /**
     * Create remarks model.
     *
     * @return mixed
     */
    protected static function createRemarksModel()
    {
        $remarkModel = config('remark.remark_model');

        return new $remarkModel();
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

        return $this->remarks()->getMorphClass();
    }
}
