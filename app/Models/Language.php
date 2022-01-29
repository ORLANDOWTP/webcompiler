<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public function snippets(){
        return $this->hasMany(Snippet::class);
    }
    public function tutorials(){
        return $this->hasMany(Tutorial::class);
    }
}
