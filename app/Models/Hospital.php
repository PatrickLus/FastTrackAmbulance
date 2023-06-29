<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

     //properties
     protected $table= "hospitals";
     protected $primaryKey = "id";
     protected $fillable = ['name','driver_id','location'];

     //relationships
     public function drivers(){
        return $this->hasMany(Driver::class);
     }

     public function requests (){
        return $this->hasMany(Request::class);
     }
}
