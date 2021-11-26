<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            "allergologie", "gastro-entérologie", "gynécologie", "pédiatrie", "psychiatrie", "cardiologie", "dermatologie"
        ];
        foreach ($specialities  as $speciality)
            Speciality::create([
                "title" => $speciality,
                "logo" => ""
            ]);
    }
}
