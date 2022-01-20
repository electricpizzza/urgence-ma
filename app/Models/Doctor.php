<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable =  [

        'bio',
        'address1',
        'address2',
        'speciality',
        'profile',
        'banner',
        'tel1',
        'tel2',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }

    public function theSpeciality()
    {
        return $this->belongsTo(Speciality::class, "speciality", "id");
    }
    public function schedule()
    {
        return $this->hasOne(Schedule::class, "doctor");
    }
}
