<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;
use Tests\TestCase;
use App\Models\User;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_delete_user()
    {
       
        $user = User::factory()->create();
    
        
        $response = $this->delete("/delete_user/{$user->id}", ['_token' => csrf_token()]);
    
       
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    
      
        $response->assertStatus(302);
    
       
        $response->assertRedirect(route('users'));
    }
    
   
}

