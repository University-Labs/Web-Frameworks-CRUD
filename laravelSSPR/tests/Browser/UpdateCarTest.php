<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\Models\Car;

class UpdateCarTest extends DuskTestCase
{
    public function testUpdateCarSuccess()
    {
        $this->browse(function (Browser $browser) {
            $newPrice = 111111;
            $newYear = 2000;
            $newDescription = "Test";

            $browser->visitRoute('cars.list')
                    ->assertPathIs('/pageadmin');
            
            $browser->click('.single-car-item:nth-child(1) .edit')
                    ->assertPathBeginsWith('/editcar_')
                    ->type('#price', $newPrice)
                    ->type('#yearIssue', $newYear)
                    ->type('#description', $newDescription);

            $browser->click('#content .btn-success')
                    ->assertPathIs('/pageadmin')
                    ->clickLink('Каталог')
                    ->assertPathIs('/catalog')
                    ->click('.single-car-item:nth-child(1) a')
                    ->assertPathBeginsWith('/productinfo_');

            $browser->assertSeeIn('.price', $newPrice)
                    ->assertSeeIn('.year', $newYear)
                    ->assertSeeIn('.description', $newDescription);
        });

        //проверка корректности записи в БД
        $this->assertDatabaseHas('car',
        [
            'price' => 111111,
            'yearIssue' => 2000,
            'description' => "Test",
        ]);
    }
}
