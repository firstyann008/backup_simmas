<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKuotaToDudi extends Migration
{
    public function up()
    {
        // Add column 'kuota' to 'dudi' table if not exists
        if (!$this->db->fieldExists('kuota', 'dudi')) {
            $this->forge->addColumn('dudi', [
                'kuota' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'null'       => true,
                    'after'      => 'status',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('kuota', 'dudi')) {
            $this->forge->dropColumn('dudi', 'kuota');
        }
    }
}


