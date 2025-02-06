<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signage extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
