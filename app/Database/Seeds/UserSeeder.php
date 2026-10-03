<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');
        $this->db->table('users')->insertBatch([
            ['username' => 'admin01', 'password' => password_hash('Password123!', PASSWORD_DEFAULT), 'full_name' => 'Gabriel Santos', 'created_at' => $createdAt],
            ['username' => 'cashier01', 'password' => password_hash('Password123!', PASSWORD_DEFAULT), 'full_name' => 'Angela Reyes', 'created_at' => $createdAt],
            ['username' => 'cashier02', 'password' => password_hash('Password123!', PASSWORD_DEFAULT), 'full_name' => 'Mark Dela Cruz', 'created_at' => $createdAt],
            ['username' => 'staff01', 'password' => password_hash('Password123!', PASSWORD_DEFAULT), 'full_name' => 'Nicole Garcia', 'created_at' => $createdAt],
            ['username' => 'manager01', 'password' => password_hash('Password123!', PASSWORD_DEFAULT), 'full_name' => 'John Mendoza', 'created_at' => $createdAt],
        ]);
    }
}
