<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $guarded = [];
    public function path()
    {
        return '/notes/' . $this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
