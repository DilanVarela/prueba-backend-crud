<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Models\World;

use Carbon\Carbon;

class User extends Model
{   
    protected $table  = 'user';    
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function createUser($data){
        
        $insert_data = $this->builder->insert($data);

        return $insert_data;
    }

    public function updateUser($id, $data){
        
        $update_data = $this->builder->where('id', $id)->update($data);

        return $update_data;
    }

    public function deleteUser($id){
        
        $delete_data = $this->builder->where('id', $id)->delete();

        return $delete_data;
    }

    public function allUsersJson(){
        
        $world = new World();

        $allUsers = $this->db
                         ->query("SELECT id, 
                                  gender, 
                                  age, 
                                  name, 
                                  lastname, 
                                  email, 
                                  address,
                                  type_resident,
                                  country, 
                                  state, 
                                  city, comment FROM `user`")
                         ->getResultArray();
                         
        foreach($allUsers as $key => $value){
            $allUsers[$key]['gender'] = ucfirst($allUsers[$key]['gender']);
            $allUsers[$key]['country'] = $world->getCountryByID($allUsers[$key]['country']);
            $allUsers[$key]['state'] = $world->getStateByID($allUsers[$key]['state']);
            $allUsers[$key]['city'] = $world->getCityByID($allUsers[$key]['city']);
        }
        
        return $allUsers;
    }

    public function allUsers(){

        $world = new World();

        $allUsers = $this->builder->get()->getResultArray();

        foreach($allUsers as $key => $value){
            $allUsers[$key]['gender'] = ucfirst($allUsers[$key]['gender']);
            $allUsers[$key]['country'] = $world->getCountryByID($allUsers[$key]['country']);
            $allUsers[$key]['state'] = $world->getStateByID($allUsers[$key]['state']);
            $allUsers[$key]['city'] = $world->getCityByID($allUsers[$key]['city']);
        }
        
        return $allUsers;
    }

    public function userById($id){
        $userById = $this->builder->getWhere(['id' => $id])->getResultArray();
        
        return $userById;
    }

    public function mostRegistersCities(){
        $world = new World();

        $citiesRegister = $this->db->query("SELECT COUNT(city) as 'Num cities', city FROM `user` GROUP BY city LIMIT 5")->getResultArray();

        foreach($citiesRegister as $key => $value){
            $citiesRegister[$key]['city'] =  $world->getCityByID($citiesRegister[$key]['city']);
        }

        return $citiesRegister;
    }
}
