<?php

namespace Fuguevit\Commentable\Traits;

use Illuminate\Support\Facades\Config;
use Fuguevit\Commentable\Contracts\RemarkeInterface;

class RemarkableTrait implements RemarkeInterface
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
        return $this->morphMany(Config::get('remark.remarkModel'), 'remarkable');
    }

    /**
     * {@inheritdoc}
     */
    public function addRemark($userId, $content)
    {
        $remark = $this->createRemarksModel()->create([
            'user_id'   => $userId,
            'content'   => $content
        ]);
        $this->remarks()->attach($remark);
    }

    /**
     * Create remarks model.
     *
     * @return mixed
     */
    protected static function createRemarksModel()
    {
        $tagModel = Config::get('remark.remarkModel');

        return new $tagModel();
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