<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Larapen\Admin\app\Models\Traits\Crud;
class ChatPermission extends Model
{
    use HasFactory;
    use Crud;
        protected $guarded = ['id'];
    protected $fillable = ['role', 'permission'];
}
