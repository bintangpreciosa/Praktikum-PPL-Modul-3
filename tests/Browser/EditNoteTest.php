<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
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
            ->visit('/notes') //Menngunjungi halaman notes
            ->clickLink('Edit') //Click link edit untuk membuka halaman edit note
            ->assertPathIs('/edit-note-page/2') //Memastikan path adalah /edit-note-page/1
            ->type('title', 'Praktikum Automation Testing Laravel Dusk') //Mengisi form title
            ->type('description', 'Praktikum hari ini belajar menggunakan Laravel Dusk untuk melakukan testing pada aplikasi Laravel')//Mengisi form description
            ->press('UPDATE') //Menekan tombol update untuk mengupdate notes
            ->assertPathIs('/notes'); //Kembali ke halaman notes
        });
    }
}