<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cities extends Migration
{
    public function up()
    {   
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'state_id' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('state_id', 'state', 'id','','');
        $this->forge->createTable('city');
        $this->db->enableForeignKeyChecks();
    }
    

    public function down()
    {   
        $this->forge->dropTable('city');
    }
}
