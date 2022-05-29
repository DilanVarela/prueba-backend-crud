<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StateSeeder extends Seeder
{
    protected $table = 'state';
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table); 
    }

    public function run()
    {
        $states_json = file_get_contents('..\json-countries-states-cities\states.json');

        $states_json = json_decode($states_json, true);

        $this->builder->insertBatch($states_json);
    }
}
