<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $name = $faker->name;
            $user = User::create([
                "username" => str_replace(" ", "-", $name),
                'name' => $name,
                'role' => 'doc',
                'email' => str_replace(" ", "-", $name) . "@gmail.com",
                'password' => Hash::make('password'),
            ]);
            $doc = $user->doctor()->create([
                'bio' => $faker->text(150),
                'address1' => $faker->address(),
                'address2' => $faker->address(),
                'tel1' => $faker->phoneNumber(),
                'tel2' => $faker->phoneNumber(),
                'speciality' => random_int(1, 7),
                'profile' => $faker->image(null, 300, 300, "people"),
                'banner' => $faker->image(null, 300, 300, 'abstract'),
            ]);
            $availability = array(
                "mon" => array(
                    array(
                        "from" => 8,
                        "to" => 18
                    ),
                    array(
                        "from" => 21,
                        "to" => 23
                    )
                ),
                "fri" => array(
                    array(
                        "from" => 8,
                        "to" => 18
                    )
                )
            );
            $schedule = $doc->schedule()->create([
                "availability" => json_encode($availability)
            ]);
        }
    }
}
