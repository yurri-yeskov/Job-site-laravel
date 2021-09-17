<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Chatter_Vote extends Model
{
    use Sortable;

    protected $table = 'chatter_discussion_vote';
    public $timestamps = true;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function discussion()
    {
        return $this->belongsTo(
            'App\Models\Chatter_Discussion',
            'chatter_discussion_id'
        );
    }
}
