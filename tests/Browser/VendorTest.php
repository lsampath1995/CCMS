<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VendorTest extends DuskTestCase
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
    public function test_vendors_table()
    {
        $this->assertDatabaseHas('vendors', []);
    }

    /** @test */
    public function test_vendors_list()
    {
        $user = \Auth::guard('admin')->user();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/vendor')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/vendor');
        });
        return view('admin.vendor.vendor');
    }

    /** @test */
    public function test_add_vendor()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/vendor/create')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/vendor/create');
        });
        return view('admin.vendor.vendor_create');
    }

    /** @test */
    public function test_edit_vendor()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/vendor/edit')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/vendor/edit');
        });
        return view('admin.vendor.vendor_edit');
    }

    /** @test */
    public function test_vendor_details()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/vendor/6')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/vendor/6');
        });
        return view('admin.vendor.vendor_view');
    }

    /** @test */
    public function test_vendor_account_details()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/expense-account-list/6')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/expense-account-list/6');
        });
        return view('admin.vendor.vendor_account');
    }
}
