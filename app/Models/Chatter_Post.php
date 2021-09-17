<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatter_Post extends Model
{
    protected $table = 'chatter_post';
    public $timestamps = true;
    protected $fillable = [
        'chatter_discussion_id',
        'user_id',
        'body',
        'markdown',
    ];

    public function discussion()
    {
        return $this->belongsTo(
            'App\Models\Chatter_Discussion',
            'chatter_discussion_id'
        );
    }

    public function votes()
    {
        return $this->hasMany(
            'App\Models\Chatter_Post_Vote',
            'chatter_post_id',
            'id'
        );
    }

    public function votesCount()
    {
        return $this->votes()
            ->selectRaw('chatter_post_id,emoji_type,count(*) as total')
            ->groupBy('emoji_type');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
