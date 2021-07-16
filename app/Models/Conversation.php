<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    public function Writer()
    {
        // one to many
        return $this->belongsTo('App\Models\User','writer','id');
    }
}
