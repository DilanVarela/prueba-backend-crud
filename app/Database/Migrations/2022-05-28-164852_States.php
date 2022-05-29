<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class States extends Migration
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
            'country_id' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('country_id', 'country', 'id','','');
        $this->forge->createTable('state');
        $this->db->enableForeignKeyChecks();
    }
    

    public function down()
    {
        $this->forge->dropTable('state');
    }
}
