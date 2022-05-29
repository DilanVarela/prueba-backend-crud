<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CountrySeeder extends Seeder
{
    protected $table = 'country';
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table); 
    }

    public function run()
    {
        $countries_json = file_get_contents('..\json-countries-states-cities\countries.json');

        $countries_json = json_decode($countries_json, true);

        $this->builder->insertBatch($countries_json);
    }
}
