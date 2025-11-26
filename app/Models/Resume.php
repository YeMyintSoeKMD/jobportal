<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $guarded = [];

    protected $casts = [
        'skills' => 'array',
        'languages' => 'array',
        'education' => 'array',
        'certifications' => 'array',
        'social' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
