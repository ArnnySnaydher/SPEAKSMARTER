<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded =[];

    //Relacion de muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    //Relacion de pertenencia 
    public function Level(){
        return $this->belongsTo(Level::class);
    }
}
