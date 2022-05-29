<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {

        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'age' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'type_resident' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'country' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true
            ],
            'state' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true
            ],
            'city' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true
            ],
            'comment' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('country', 'country', 'id');
        $this->forge->addForeignKey('state', 'state', 'id');
        $this->forge->addForeignKey('city', 'city', 'id');
        $this->forge->createTable('user');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
