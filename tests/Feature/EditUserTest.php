<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User; 
use Database\Factories\UserFactory;
class EditUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;

    public function test_can_edit_user()
    {
        // Assuming you have a user in the database
        $user = UserFactory::new()->create();

        $response = $this->post("/edit_info/{$user->id}", [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',

        ]);

        $response->assertStatus(302) // Adjust the expected status code
                 ->assertRedirect('/'); // Adjust the expected redirection URL
    }
}
