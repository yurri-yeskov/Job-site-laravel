<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatter_Category extends Model
{
    protected $table = 'chatter_categories';
    public $timestamps = true;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function discussions()
    {
        return $this->hasMany(
            Chatter_Models::className(Chatter_Discussion::class)
        );
    }
}
