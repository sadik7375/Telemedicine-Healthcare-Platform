<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamber extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'hospital_name', 'address', 'available_time', 'appointment_contact'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
