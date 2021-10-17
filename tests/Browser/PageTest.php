<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PageTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    /** @test */
    public function test_login_form_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                ->assertSee('System Login');
        });
    }

    /** @test */
    public function test_link_request_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/admin/password/reset')
                ->assertSee('Recover Your Password');
        });
    }

    /** @test */
    public function test_data_backup_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('http://localhost/backupmanager')
                ->assertSee('BACKUP DATABASE & FILES');
        });
    }

    /** @test */


}
