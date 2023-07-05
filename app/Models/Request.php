<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    //properties
    // TODO: location to lon and lat
    protected $table = "requests";
    protected $primaryKey = "id";
    protected $fillable = ['patient_id', 'hospital_id', 'location'];
    protected $hidden = ['password', 'otp'];

    //relationships
    public function patients()
    {
        return  $this->belongsTo(Patient::class);
    }
}
