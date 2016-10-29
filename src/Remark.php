<?php

namespace Fuguevit\Commentable;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'remarks';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [ 'user_id', 'content' ];

    public function remarkable()
    {
        return $this->morphTo();
    }
}