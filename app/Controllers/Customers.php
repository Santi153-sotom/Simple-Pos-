<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['full_name' => 'Andrea Santos', 'email' => 'andrea.santos@example.com', 'phone' => '0917-123-4501'],
            ['full_name' => 'Benjie Cruz', 'email' => 'benjie.cruz@example.com', 'phone' => '0918-234-5602'],
            ['full_name' => 'Carla Reyes', 'email' => 'carla.reyes@example.com', 'phone' => '0919-345-6703'],
            ['full_name' => 'Daniel Garcia', 'email' => 'daniel.garcia@example.com', 'phone' => '0920-456-7804'],
            ['full_name' => 'Ella Mendoza', 'email' => 'ella.mendoza@example.com', 'phone' => '0921-567-8905'],
        ];

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'customers' => $customers,
        ]);
    }
}
