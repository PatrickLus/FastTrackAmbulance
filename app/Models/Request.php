<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    use HasFactory;

    //properties
    // TODO: location to lon and lat
    protected $table = "requests";
    protected $primaryKey = "id";
    protected $fillable = ['patient_id', 'hospital_id', 'location', 'description'];
    protected $hidden = ['password', 'otp'];

    //relationships
    public function patients(): BelongsTo
    {
        return  $this->belongsTo(Patient::class);
    }
}
