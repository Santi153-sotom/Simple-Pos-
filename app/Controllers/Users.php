<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin01', 'full_name' => 'Alex Ramirez', 'role' => 'Administrator'],
            ['username' => 'manager01', 'full_name' => 'Bianca Flores', 'role' => 'Manager'],
            ['username' => 'cashier01', 'full_name' => 'Carlo Lim', 'role' => 'Cashier'],
            ['username' => 'cashier02', 'full_name' => 'Diana Aquino', 'role' => 'Cashier'],
            ['username' => 'stock01', 'full_name' => 'Enzo Villanueva', 'role' => 'Inventory Staff'],
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $users,
        ]);
    }
}
