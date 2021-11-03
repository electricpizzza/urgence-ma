<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable =  [
        'user',
        'bio',
        'address1',
        'address2',
        'speciality',
        'profile',
        'banner'
    ];

    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }

    public function specialities()
    {
        return $this->hasMany(Speciality::class);
    }
}
