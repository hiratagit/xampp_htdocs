<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Person;

class HelloTest extends TestCase
{
    use RefreshDatabase;

    public function testHello() {
        User::factory()->create([
            'name' => 'AAA',
            'email' => 'BBB@CCC.COM',
            'password' => 'ABCABC',
        ]);

        User::factory(10)->create();

        $this->assertDatabaseHas('users', [
            'name' => 'AAA',
            'email' => 'BBB@CCC.COM',
            'password' => 'ABCABC',
        ]);

        Person::factory()->create([
            'name' => 'XXX',
            'mail' => 'XXX@ZZZ.COM',
            'age' => '123',
        ]);

        Person::factory(10)->create();

        $this->assertDatabaseHas('people', [
            'name' => 'XXX',
            'mail' => 'XXX@ZZZ.COM',
            'age' => '123',
        ]);

        
    }

    // public function testHello() {
    //     $this->assertTrue(true);

    //     $response = $this->get('/');
    //     $response->assertStatus(200);

    //     $response = $this->get('/hello');
    //     $response->assertStatus(302);

    //     $user = User::factory()->create();
    //     $response = $this->actingAs($user)->get('/hello');
    //     $response->assertStatus(200);

    //     $response = $this->get('/no_require');
    //     $response->assertStatus(404);
    // }

    // public function testHello() {
    //     $this->assertTrue(true);

    //     $arr = [];
    //     $this->assertEmpty($arr);

    //     $msg = "Hello";
    //     $this->assertEquals('Hello', $msg);

    //     $n = random_int(0, 100);
    //     $this->assertLessThan(100, $n);
    // }
}