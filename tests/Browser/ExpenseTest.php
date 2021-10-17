<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExpenseTest extends DuskTestCase
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
    public function test_expenses_table()
    {
        $this->assertDatabaseHas('expenses', []);
    }

    /** @test */
    public function test_expense_types_table()
    {
        $this->assertDatabaseHas('expenses_items', []);
    }

    /** @test */
    public function test_expense_categories_table()
    {
        $this->assertDatabaseHas('expense_cats', []);
    }

    /** @test */
    public function test_expense_list()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/expense')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/expense');
        });
        return view('admin.expence.expense');
    }

    /** @test */
    public function test_add_expense()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/expense-create')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/expense-create');
        });
        return view('admin.expence.expense_create');
    }

    /** @test */
    public function test_edit_expense()
    {
        $user = \Auth::guard('admin')->user();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/expense/1/edit')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/expense/1/edit');
        });
        return view('admin.expence.expense_edit');
    }

    /** @test */
    public function test_expense_types_list()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/expense-type')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/expense-type');
        });
        return view('admin.expence.expense_type');
    }

    /** @test */
    public function test_add_expense_type()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/expense-type')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/expense-type');
        });
        return view('admin.expence.expense_type_create');
    }

    /** @test */
    public function test_edit_expense_type()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/expense-type')
                ->pause(5000)
                ->assertUrlIs('http://localhost//admin/expense-type');
        });
        return view('admin.expence.expense_type_edit');
    }
}
