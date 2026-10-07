<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('customers')->countAllResults() === 0) {
            $this->db->table('customers')->insertBatch([
                ['full_name' => 'Andrea Santos', 'email' => 'andrea.santos@gmail.com', 'phone' => '0917-123-4501'],
                ['full_name' => 'Benjie Cruz', 'email' => 'benjie.cruz@gmail.com', 'phone' => '0918-234-5602'],
                ['full_name' => 'Carla Reyes', 'email' => 'carla.reyes@gmail.com', 'phone' => '0919-345-6703'],
                ['full_name' => 'Daniel Garcia', 'email' => 'daniel.garcia@gmail.com', 'phone' => '0920-456-7804'],
                ['full_name' => 'Ella Mendoza', 'email' => 'ella.mendoza@gmail.com', 'phone' => '0921-567-8905'],
            ]);
        }

        if ($this->db->table('users')->countAllResults() === 0) {
            $password = password_hash('Pos12345!', PASSWORD_DEFAULT);
            $this->db->table('users')->insertBatch([
                ['username' => 'admin01', 'full_name' => 'Alex Ramirez', 'role' => 'Administrator', 'password' => $password],
                ['username' => 'manager01', 'full_name' => 'Bianca Flores', 'role' => 'Manager', 'password' => $password],
                ['username' => 'cashier01', 'full_name' => 'Carlo Lim', 'role' => 'Cashier', 'password' => $password],
                ['username' => 'cashier02', 'full_name' => 'Diana Aquino', 'role' => 'Cashier', 'password' => $password],
                ['username' => 'stock01', 'full_name' => 'Enzo Villanueva', 'role' => 'Inventory Staff', 'password' => $password],
            ]);
        }
    }
}
