<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    /** @test */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function login_displays_the_login_form()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }
    /** @test */
    public function login_displays_validation_errors()
    {
        $response = $this->post('/', []);

        $response->assertStatus(405);
        $response->assertJsonValidationErrors('password');
        
    }

    public function login_authenticates_and_redirects_user()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);
    
        $response->assertRedirect(route('articulos'));
        $this->assertAuthenticatedAs($user);
    }

    public function register_creates_and_authenticates_a_user()
    {
        $response = $this->post(route('register'), [
            'name' => 'JMac',
            'email' => 'jmac@example.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $response->assertRedirect(route('articulos'));

        // ...
    }
}
