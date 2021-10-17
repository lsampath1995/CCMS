<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function test_login_as_admin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->type('email', 'nsa.tst.1995@gmail.com')
                ->type('password', '3891992')
                ->press('login')
                ->pause(5000)
                ->assertPathIs('/admin/dashboard');
        });
    }

    /** @test */
    public function test_fogot_password_link()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->click('#reset')
                ->assertPathIs('/admin/password/reset');
        });
    }


}
