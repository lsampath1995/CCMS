<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccountantLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test
     * @throws \Throwable
     */
    public function test_login_as_accountant()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->type('email', 'accountant.cms@gmail.com')
                ->type('password', 'Accountant1@cms')
                ->press('login')
                ->assertPathIs('/admin/dashboard');
        });
    }
}
