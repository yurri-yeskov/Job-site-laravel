<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Chatter_Post_Vote extends Model
{
    use Sortable;

    protected $table = 'chatter_post_vote';
    public $timestamps = true;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        return $this->belongsTo(
            'App\Models\Chatter_Post',
            'chatter_post_id'
        );
    }
}
