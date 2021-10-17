<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssistantLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test
     * @throws \Throwable
     */
    public function test_login_as_assistant()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->type('email', 'assistant.cms@gmail.com')
                ->type('password', 'Assistant1@cms')
                ->press('login')
                ->assertPathIs('/admin/dashboard');
        });
    }
}
