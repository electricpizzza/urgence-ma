<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $fillable =  [
        'doctor',
        'title',
        'description',
        'document',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
