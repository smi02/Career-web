<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companys';

    protected $guarded = [];
    
    public function user() {
        return $this->hasMany(User::class);
    }

    public function job()
    {
        return $this->hasManyThrough(Info::class, User::class);
    }


    // public function user() : BelongsTo {
    //     return $this->belongsTo(User::class);
    // }
}
