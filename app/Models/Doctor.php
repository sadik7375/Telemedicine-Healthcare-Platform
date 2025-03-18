<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'qualification', 'treatment_category', 'specialist', 'about'
    ];

    public function chambers()
    {
        return $this->hasMany(Chamber::class);
    }
}
