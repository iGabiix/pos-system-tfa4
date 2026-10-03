<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');
        $this->db->table('customers')->insertBatch([
            ['full_name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'phone' => '09171234567', 'created_at' => $createdAt],
            ['full_name' => 'Maria Santos', 'email' => 'maria@example.com', 'phone' => '09181234567', 'created_at' => $createdAt],
            ['full_name' => 'Pedro Reyes', 'email' => 'pedro@example.com', 'phone' => '09191234567', 'created_at' => $createdAt],
            ['full_name' => 'Anna Garcia', 'email' => 'anna@example.com', 'phone' => '09201234567', 'created_at' => $createdAt],
            ['full_name' => 'Carlo Mendoza', 'email' => 'carlo@example.com', 'phone' => '09211234567', 'created_at' => $createdAt],
        ]);
    }
}
