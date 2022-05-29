<?php

namespace App\Models;

use CodeIgniter\Model;

class World extends Model
{
    protected $table_country = 'country';
    protected $table_state   = 'state';
    protected $table_city    = 'city';

    protected $db;
    protected $builder_country;
    protected $builder_state;
    protected $builder_city;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder_country = $this->db->table($this->table_country); 
        $this->builder_state = $this->db->table($this->table_state); 
        $this->builder_city = $this->db->table($this->table_city); 
    }

    public function getAllCountries(){
        $allCountries = $this->builder_country->orderBy('name', 'ASC')->get()->getResultArray();

        return $allCountries;
    }

    public function getCountryByID($id){
        $allCountries = $this->builder_country->orderBy('name', 'ASC')->getWhere(['id ' => $id])->getResultArray();

        // var_dump($allCountries[0]['name']);die();

        return $allCountries[0]['name'];
    }

    public function getStateByCountry($id){
        $allCountries = $this->builder_state->orderBy('name', 'ASC')->getWhere(['country_id ' => $id])->getResultArray();

        return $allCountries;
    }

    public function getStateByID($id){
        $allCountries = $this->builder_state->orderBy('name', 'ASC')->getWhere(['id ' => $id])->getResultArray();

        return $allCountries[0]['name'];
    }

    public function getCityByState($id){
        $allCountries = $this->builder_city->orderBy('name', 'ASC')->getWhere(['state_id ' => $id])->getResultArray();

        return $allCountries;
    }

    public function getCityByID($id){
        $allCountries = $this->builder_city->orderBy('name', 'ASC')->getWhere(['id ' => $id])->getResultArray();

        return $allCountries[0]['name'];
    }
}
