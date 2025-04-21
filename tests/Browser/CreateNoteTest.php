<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
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
            ->clickLink('Notes') //Click link notes untuk membuka menu notes
            ->assertPathIs('/notes') //Memastikan path adalah /notes
            ->clickLink('Create Note') //Click link create note untuk membuka halaman create note
            ->assertPathIs('/create-note') //Memastikan path adalah /create-note
            ->type('title', 'Automation Testing Laravel Dusk') //Mengisi form title
            ->type('description', 'Hari ini belajar menggunakan Laravel Dusk untuk melakukan testing pada aplikasi Laravel')//Mengisi form description
            ->press('CREATE'); //Menekan tombol create untuk membuat notes
        });
    }
}