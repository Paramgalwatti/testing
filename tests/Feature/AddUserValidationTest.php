<?php

// tests/Feature/AddUserValidationTest.php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddUserValidationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_name_is_required()
    {
        $response = $this->post('/user_info', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_email_is_required()
    {
        $response = $this->post('/user_info', [
            'name' => 'Test User',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_email_must_be_valid()
    {
        $response = $this->post('/user_info', [
            'name' => 'Test User',
            'email' => 'invalid-email',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    
}
