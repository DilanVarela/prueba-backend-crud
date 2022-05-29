<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CitySeeder extends Seeder
{
    protected $table = 'city';
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table); 
    }

    public function run()
    {
        $cities_json = file_get_contents('..\json-countries-states-cities\cities.json');

        $cities_json = json_decode($cities_json, true);

        $this->builder->insertBatch($cities_json);
    }
}
