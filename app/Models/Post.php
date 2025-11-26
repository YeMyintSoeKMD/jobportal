<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $guarded = [];

    protected $appends = ['applied', 'application_status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function applications(){
        return $this->hasMany(Application::class, 'job_id');
    }

    public function getAppliedAttribute(){
        if(!Auth::check()){
            return false;
        }

        return $this->applications()
        ->where('candidate_id', Auth::id())
        ->exists();
    }

    public function getApplicationStatusAttribute(){
        if(!Auth::check()){
            return false;
        }

        return $this->applications()
        ->where('candidate_id', Auth::id())
        ->pluck('status')
        ->first();
    }
}
