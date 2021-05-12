<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\User;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateUser()
    {
        $user = User::factory()->create();

        $this->assertNotEmpty($user->name);
    }

    public function testUserApi()
    {
        $user = User::factory()->create();

        $response = $this->json('GET', '/'.$user->id);
        $response
            ->seeJson([
                'id' => $user->id
            ]);

    }
}
