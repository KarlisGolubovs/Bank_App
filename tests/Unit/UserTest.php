<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testFindLoggedInUser()
    {
        // Create a user
        $user = User::factory()->create();

        // Manually set the authenticated user in the session
        $this->app['session']->put('auth', [
            'guard' => 'web',
            'user' => $user,
        ]);

        // Get the authenticated user
        $foundUser = Auth::user();

        // Assert that the found user is the same as the logged-in user
        $this->assertEquals($user->id, $foundUser->id);
    }
}
