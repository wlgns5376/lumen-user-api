<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testUsersApi()
    {
        $response = $this->call('GET', '/users');

        $this->assertEquals(200, $response->status());
    }

    public function testUserApi()
    {
        $this->json('GET', '/user/1')
            ->seeJson([
                'email' => 'test@test.com'
            ]);
    }
}
