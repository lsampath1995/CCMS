<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TeamTest extends DuskTestCase
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
    public function test_members_table()
    {
        $this->assertDatabaseHas('task_members', []);
    }

    /** @test */
    public function test_members_roles_table()
    {
        $this->assertDatabaseHas('roles', []);
    }

    /** @test */
    public function test_members_list()
    {
        $user = \Auth::guard('admin')->user();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/client_user')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/client_user');
        });
        return view('admin.team-members.team_member');
    }

    /** @test */
    public function test_add_member()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/client_user/create')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/client_user/create');
        });
        return view('admin.team-members.team_member_create');
    }

    /** @test */
    public function test_edit_member()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/client_user/6/edit')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/client_user/6/edit');
        });
        return view('admin.team-members.team_member_edit');
    }

    /** @test */
    public function test_members_roles_list()
    {
        $user = \Auth::guard('admin')->user();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/role')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/role');
        });
        return view('admin.role.index');
    }

    /** @test */
    public function test_add_member_role()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/role')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/role');
        });
        return view('admin.role.create');
    }

    /** @test */
    public function test_edit_member_role()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/role')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/role');
        });
        return view('admin.role.edit');
    }

}
