<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'logo'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }
}
