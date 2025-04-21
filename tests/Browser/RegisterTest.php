<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRegister(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') //Mengunjungi halaman utama
                ->assertSee('Enterprise Application Development') //Memastikan text Enterprise Application Development ada di halaman utama
                ->clickLink('Register') //Click link register untuk membuka halaman register
                ->assertPathIs('/register') //Alamat yang dituju adalah /register
                ->type('name', 'admin') //Mengisi form name
                ->type('email', 'admin@gmail.com') //Mengisi form email
                ->type('password', 'password') //Mengisi form password
                ->type('password_confirmation', 'password') //Mengisi form password confirmation
                ->press('REGISTER'); //Menekan tombol register untuk mendaftar
        });
    }
}