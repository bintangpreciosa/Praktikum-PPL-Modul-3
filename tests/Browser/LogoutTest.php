<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::where('email','admin@gmail.com')->first(); //Mencari user dengan email
            $browser
            ->loginAs($user) //Login sebagai user
            ->visit('/dashboard') //Menngunjungi halaman dashboard
            ->assertSee('Dashboard') //Memastikan text dashboard ada di halaman Dashboard
            ->click('#click-dropdown') //Click dropdown untuk membuka menu dropdown
            ->clickLink('Log Out') //Click link logout
            ->assertPathIs('/') //Memastikan path adalah /login
            ->clickLink('Log in') //Klik log in kembali
            ->assertPathIs('/login');//Masuk ke halaman login
        });
    }
}