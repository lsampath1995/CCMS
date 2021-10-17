<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

class AccountsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function test_admin_account()
    {
        $this->assertDatabaseHas('admins', [
            'email' => 'nsa.tst.1995@gmail.com',
            'password' => '$2y$10$r.O0Vie.F2NU7GFnkI061One.2L5XuJseOrz8wfXe9D0HzZgprPXm',
            'user_type' => 'admin',
            'is_user_type' => 'ADVOCATE',
            'is_active' => 'Yes',
        ]);
    }

    /** @test */
    public function test_assistant_account()
    {
        $this->assertDatabaseHas('admins', [
            'email' => 'assistant.cms@gmail.com',
            'password' => '$2y$10$nVD3kpqlbrpUg.0c5VkjW.BEgwSIgnw61gOcia9z/XUpewz1Kw8nW',
            'user_type' => 'user',
            'is_user_type' => 'STAFF',
            'is_active' => 'Yes',
        ]);
    }

    /** @test */
    public function test_accountant_account()
    {
        $this->assertDatabaseHas('admins', [
            'email' => 'accountant.cms@gmail.com',
            'password' => '$2y$10$c4JMc/lHwSSTHyFxdd8Psu9eB6Udv7ziuB5lgAUPGFDsvJOOj43ua',
            'user_type' => 'user',
            'is_user_type' => 'STAFF',
            'is_active' => 'Yes',
        ]);
    }
}
