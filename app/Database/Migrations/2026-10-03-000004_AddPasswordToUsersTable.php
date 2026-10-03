<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'username'],
        ]);

        $this->db->table('users')->update([
            'password' => password_hash('Password123!', PASSWORD_DEFAULT),
        ]);

        $this->forge->modifyColumn('users', [
            'password' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'password');
    }
}
