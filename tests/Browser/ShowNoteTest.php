<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowNoteTest extends DuskTestCase
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
            ->clickLink('Praktikum Automation Testing Laravel Dusk') //Click title notes untuk membuka halaman show note
            ->assertPathIs('/note/1'); //Setelah klik maka akan masuk ke halaman show note yang dituju
        });
    }
}