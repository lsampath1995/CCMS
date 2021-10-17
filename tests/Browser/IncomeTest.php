<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IncomeTest extends DuskTestCase
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

    /** @test */
    public function test_advocate_service_table()
    {
        $this->assertDatabaseHas('services', []);
    }

    /** @test */
    public function test_clients_invoices_table()
    {
        $this->assertDatabaseHas('invoices', []);
    }

    /** @test */
    public function test_advocate_services_list()
    {
        $user = \Auth::guard('admin')->user();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/service')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/service');
        });
        return view('admin.service.service');
    }

    /** @test */
    public function test_add_advocate_service()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/service')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/service');
        });
        return view('admin.service.create');
    }

    /** @test */
    public function test_edit_advocate_service()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/service')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/service');
        });
        return view('admin.service.edit');
    }

    /** @test */
    public function test_clients_invoices_list()
    {
        $user = \Auth::guard('admin')->user();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/invoice')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/invoice');
        });
        return view('admin.invoice.invoice');
    }

    /** @test */
    public function test_add_clients_invoices()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/invoice')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/invoice');
        });
        return view('admin.invoice.invoice_create');
    }

    /** @test */
    public function test_edit_clients_invoices()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/invoice')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/invoice');
        });
        return view('admin.invoice.invoice_edit');
    }
}
