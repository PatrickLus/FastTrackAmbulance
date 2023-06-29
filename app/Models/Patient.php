<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    //properties
    protected $table= "patients";
    protected $primaryKey = "id";
    protected $fillable = ['fName','lName','phone','email','password','otp'];
    protected $hidden = ['password','otp'];

    //relationships
    public function requests (){
        return  $this->hasMany(Request::class);
    }
}
