<?php

namespace Tests\Feature\Auth;

use App\User; // Tambahkan use model App\User
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    // Trait refresh database agar migration dijalankan
    use RefreshDatabase;

    /** @test */
    public function registered_user_can_login()
    {
        // Kita memiliki 1 user terdaftar
        $user = factory(User::class)->create([
            'email'    => 'username@example.net',
            'password' => bcrypt('secret'),
        ]);

        // Kunjungi halaman '/login'
        $this->get('/login');

        // Submit form login dengan email dan password yang tepat
        $this->assertDatabaseHas('users', [
            'email'    => 'username@example.net',
            'password' => 'secret',
        ]);

        // Lihat halaman ter-redirect ke url '/home' (login sukses).
        $this->get('/home');

        // Kita melihat halaman tulisan "Dashboard" pada halaman itu.
        
    }
}