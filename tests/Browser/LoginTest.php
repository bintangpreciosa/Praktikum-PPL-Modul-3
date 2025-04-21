<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') //Mengunjungi halaman utama
            ->assertSee('Enterprise Application Development') //Memastikan text Enterprise Application Development ada di halaman utama
            ->clickLink('Log in') //Click link login untuk membuka halaman login
            ->assertPathIs('/login') //Memastikan alamat yang dituju adalah /login
            ->type('email', 'admin@gmail.com') //Mengisi form email
            ->type('password', 'password')   // 
            ->press('LOG IN'); // //Menekan tombol login untuk masuk ke halaman dashboard
        });
    }
}