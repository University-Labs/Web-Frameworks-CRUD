<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use PHPUnit\Framework\TestCase;
use App\Models\BaseAvto;
use App\Models\AvtoFirm;

class AddDeleteBaseavtoTest extends DuskTestCase
{
    public function testAddBaseavtoSuccess()
    {
        $countBeforeAdd = BaseAvto::count();

        $this->browse(function (Browser $browser) {
            $nameBaseavto = 'TextCase';
            $selectedOptions = 1;

            $browser->visitRoute('bases.list')
                        ->assertPathIs('/baseavtolist')
                        ->click('#add-baseavto-btn');
                        
            $browser->assertRouteIs('bases.create')
                        ->type('#modelName', $nameBaseavto)
                        ->select('#PK_AvtoFirm', $selectedOptions);

            $browser->click('.btn-success');

            $firm = AvtoFirm::find($selectedOptions);

            $browser->assertRouteIs('bases.list')
                        ->assertSeeIn('.table tbody tr:last-child > td:nth-child(2)', $nameBaseavto)
                        ->assertSeeIn('.table tbody tr:last-child > td:nth-child(3)', $firm->firmName);
        });

        //проверка изменения количества записей:
        $this->assertEquals($countBeforeAdd, BaseAvto::count() - 1);
        //проверка наличия записи в БД
        $this->assertDatabaseHas('baseavto',
            [
                'modelName' => 'TextCase',
                'PK_AvtoFirm' => 1,
            ]);
    }

    public function testDeleteBaseavtoSuccess()
    {
        $countBeforeDelete = BaseAvto::count();

        $this->browse(function (Browser $browser) {
            $nameBaseavto = 'TextCase';
            $selectedOptions = 1;
    
            $browser->visitRoute('bases.list')
                        ->assertPathIs('/baseavtolist');
            $browser->assertSeeIn('.table tbody tr:last-child > td:nth-child(2)', $nameBaseavto)
                    ->assertSeeIn('.table tbody tr:last-child > td:nth-child(3)', AvtoFirm::find($selectedOptions)->firmName);

            $browser->click('.table tbody tr:last-child > td:nth-child(4) .edit')
                        ->acceptDialog();
            
            $browser->assertPathIs('/baseavtolist');
        });

        //проверка изменения количества записей:
        $this->assertEquals($countBeforeDelete, BaseAvto::count() + 1);
        //проверка отсутствия записи в БД
        $this->assertDatabaseMissing('baseavto',
            [
                'modelName' => 'TextCase',
                'PK_AvtoFirm' => 1,
            ]);
    }
}
