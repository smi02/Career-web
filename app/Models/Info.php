<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'infos';
    protected $guarded = [];
    public function employer() {
        return $this->belongsTo(Employer::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class, foreignPivotKey : 'info_id');
    }
}

