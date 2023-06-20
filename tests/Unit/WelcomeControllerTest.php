<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class WelcomeControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */


    public function testIndex()
    {
        // Create a test user
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Make a request to the index endpoint
        $response = $this->get('/');

        // Assert that the response contains the user's name
        $response->assertSeeText("Welcome, {$user->name}!");

        // Clean up by deleting the test user
        $user->delete();
    }
}
