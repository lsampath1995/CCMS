<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ClientTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function get_authentication_from_admin()
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

    public function test_advocate_client_tables()
    {
        $this->assertDatabaseHas('advocate_clients', []);
        $this->assertDatabaseHas('client_parties_invoives', []);
    }

    /** @test */
    public function test_advocate_client_list()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/clients')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/clients');
        });
        return view('admin.client.client');
    }

    /** @test */
    public function test_create_advocate_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/clients/create')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/clients/create');
        });
        return view('admin.client.client_create');
    }

    /** @test */
    public function test_edit_advocate_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/clients/1/edit')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/clients/1/edit');
        });
        return view('admin.client.client_edit');
    }

    /** @test */
    public function test_advocate_client_cases()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/case-running/1')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/case-running/1');
        });
        return view('admin.client.view.cases_view');
    }

    /** @test */
    public function test_advocate_client_details()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/clients/1')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/clients/1');
        });
        return view('admin.client.view.client_detail');
    }

}
