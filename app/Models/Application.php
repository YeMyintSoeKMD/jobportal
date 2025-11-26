<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $guarded = [ ];

    public function job(){
        return $this->belongsTo(Post::class, 'job_id', 'id');
    }

    public function candidate(){
        return $this->belongsTo(User::class, 'candidate_id', 'id');
    }

    public function employer(){
        return $this->belongsTo(User::class, 'employer_id', 'id');
    }
}
