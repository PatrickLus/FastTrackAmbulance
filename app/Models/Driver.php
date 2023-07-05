<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
   use HasFactory;

   //properties
   protected $table = "drivers";
   protected $primaryKey = "id";
   protected $fillable = ['fName', 'lName', 'phone', 'email', 'password', 'otp'];
   protected $hidden = ['password', 'otp'];

   //relationships
   public function hospitals()
   {
      return $this->belongsToMany(Hospital::class);
   }

   public function requests()
   {
      return  $this->hasManyThrough(Request::class, Hospital::class);
   }
}
