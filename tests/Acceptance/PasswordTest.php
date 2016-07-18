<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class PasswordTest extends TestCase
{
    use DatabaseMigrations;

    public function testItUpdatesPassword()
    {
        $user = factory(App\Models\User::class)->create([
            'password' => bcrypt('password')
        ]);

        $this->actingAs($user)->post('auth/password', [
            'password'                  => 'password',
            'new_password'              => 'newPass',
            'new_password_confirmation' => 'newPass'
        ]);

        $this->assertSessionMissing('errors');
        $this->assertTrue(Auth::validate([
            'email'    => $user->email,
            'password' => 'newPass'
        ]));
    }

    public function testItValidatesCurrentPassword()
    {
        $user = factory(App\Models\User::class)->create([
            'password' => bcrypt('password')
        ]);

        $this->actingAs($user)->post('auth/password', [
            'password'                  => 'wronge_password',
            'new_password'              => 'newPass',
            'new_password_confirmation' => 'newPass'
        ]);

        $this->assertEquals(Session::get('errors')->first(), trans('auth.failed'));
    }
}
