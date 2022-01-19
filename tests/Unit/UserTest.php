<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $this->json('POST', '/user', [
        //     "username" => str_replace(" ", "-", $data['name']),
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ])->seeJsonEquals([
        //         'created' => true,
        //     ]);
        // dd(User::first());
        // $this->assertEquals(
        //     'zakariae.dinar@gmail.com',
        //     User::first()->email
        // );
        $this->assertTrue(true);
    }
}
