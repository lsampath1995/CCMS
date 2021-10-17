<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TaskTest extends DuskTestCase
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

    public function test_task_tables()
    {
        $this->assertDatabaseHas('tasks', []);
        $this->assertDatabaseHas('task_members', []);
    }

    /** @test */
    public function test_task_list()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tasks')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/tasks');
        });
        return view('admin.task.task');
    }

    /** @test */
    public function test_add_task()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tasks/create')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/tasks/create');
        });
        return view('admin.task.task_create');
    }

    /** @test */
    public function test_edit_task()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tasks/1/edit')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/tasks/1/edit');
        });
        return view('admin.task.task_edit');
    }


}
