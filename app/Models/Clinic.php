<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable =  [
        'user',
        'title',
        'description',
        'address1',
        'address2',
        'tel',
        'tel2',
        'profile',
        'banner',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialities()
    {
        return $this->hasMany(Speciality::class);
    }
}
