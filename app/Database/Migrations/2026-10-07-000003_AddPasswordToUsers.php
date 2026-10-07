<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'avatar',
            ],
        ]);

        $hash = password_hash('Pos12345!', PASSWORD_DEFAULT);
        $this->db->table('users')->where('password', null)->update(['password' => $hash]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'password');
    }
}
