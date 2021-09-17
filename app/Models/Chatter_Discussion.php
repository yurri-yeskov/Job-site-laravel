<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Chatter_Discussion extends Model
{
    use Sortable;

    protected $table = 'chatter_discussion';
    public $timestamps = true;
    public $sortable = ['created_at', 'views', 'votes'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo(
            'App\Models\Chatter_Category',
            'chatter_category_id',
            'id'
        );
    }

    public function posts()
    {
        return $this->hasMany(
            'App\Models\Chatter_Post',
            'chatter_discussion_id',
            'id'
        );
    }

    public function post()
    {
        return $this->hasMany(
            'App\Models\Chatter_Post',
            'chatter_discussion_id',
            'id'
        )->orderBy('created_at', 'ASC');
    }

    public function votes()
    {
        return $this->hasMany(
            'App\Models\Chatter_Discussion_Vote',
            'chatter_discussion_id',
            'id'
        );
    }

    public function lastpost()
    {
        return $this->hasOne(
            'App\Models\Chatter_Post',
            'chatter_discussion_id',
            'id'
        )->latest();
    }

    public function postsCount()
    {
        return $this->posts()
            ->selectRaw('chatter_discussion_id, count(*)-1 as total')
            ->groupBy('chatter_discussion_id');
    }

    public function votesCount()
    {
        return $this->votes()
            ->selectRaw('chatter_discussion_id, count(*) as total')
            ->groupBy('chatter_discussion_id');
    }

    public function users()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'chatter_user_discussion',
            'discussion_id',
            'user_id'
        );
    }
}
