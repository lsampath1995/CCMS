<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AppointmentTest extends DuskTestCase
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

    public function test_appointments_table()
    {
        $this->assertDatabaseHas('appointments', []);
    }

    /** @test */
    public function test_appointments_list()
    {
        $user = \Auth::guard('admin')->user();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/appointment')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/appointment');
        });
        return view('admin.appointment.appointment');
    }

    /** @test */
    public function test_add_appointment()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/appointment/create')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/appointment/create');
        });
        return view('admin.appointment.appointment_create');
    }

    /** @test */
    public function test_edit_appointment()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/appointment/1/edit')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/appointment/1/edit');
        });
        return view('admin.appointment.appointment_edit');
    }

}
