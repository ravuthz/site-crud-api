<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Services\AuthService;
use DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

// use PHPUnit\Event\Test\BeforeTestMethodCalled;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private string $password = "123123";

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('passport:install');
    }

    public function testUserRegistration()
    {
        $input = User::factory()->make()->toArray();
        $input['password'] = $this->password;

        $response = $this->json('POST', route('auth.register'), $input);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'username',
                    'created_at',
                    'updated_at',
                ],
                'status',
                'message',
            ])
            ->assertJson([
                'message' => 'Successfully registered user',
            ]);
    }

    public function testUserLogin()
    {
        $input = (array)User::factory()->create()->only(['username']);
        $input['password'] = $this->password;

        $response = $this->json('POST', route('auth.login'), $input);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'token_type',
                    'access_token',
                    'expires_at',
                ],
                'status',
                'message'
            ])
            ->assertJson([
                'message' => 'Successfully logged in',
            ]);
    }

    public function testUserLogout()
    {
        $auth = AuthService::login(User::factory()->create());

        $this->withHeaders([
            'Authorization' => $auth['token_type'] . ' ' . $auth['access_token'],
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ]);

        $response = $this->json('GET', route('auth.logout'));

//         $response->dumpHeaders();
//         $response->dumpSession();
//         $response->dump();
//         $response->dd();

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
                'message'
            ])
            ->assertJson([
                'message' => 'Successfully logged out',
            ]);
    }

}
