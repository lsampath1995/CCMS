<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CaseTest extends DuskTestCase
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

    public function test_case_tables()
    {
        $this->assertDatabaseHas('case_logs', []);
        $this->assertDatabaseHas('case_parties_involves', []);
        $this->assertDatabaseHas('case_transfers', []);
    }

    /** @test */
    public function test_client_running_case()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/case-running')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/case-running');
        });
        return view('admin.case.running');
    }

    /** @test */
    public function test_client_important_case()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/case-important')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/case-important');
        });
        return view('admin.case.important_cases');
    }

    /** @test */
    public function test_client_nb_case()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/case-nb')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/case-nb');
        });
        return view('admin.case.nb-cases');
    }

    /** @test */
    public function test_client_archived_case()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/case-archived')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/case-archived');
        });
        return view('admin.case.archived');
    }

    /** @test */
    public function test_add_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/case-running/create')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/case-running/create');
        });
        return view('admin.case.add_case');
    }

    /** @test */
    public function test_edit_client()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/case-running/1/edit')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/case-running/1/edit');
        });
        return view('admin.case.edit_case');
    }


}
