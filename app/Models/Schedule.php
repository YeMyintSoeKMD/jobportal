<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    public function candidate(){
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function employer(){
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function job(){
        return   $this->belongsTo(Post::class, 'job_id');
    }

    public function application(){
        return $this->belongsTo(Application::class, 'application_id');
    }

}
