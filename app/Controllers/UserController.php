<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\World;


class UserController extends BaseController
{
    public function index(){

        $data = [];

        $countries = new World();

        $countries = $countries->getAllCountries();

        $validation =  \Config\Services::validation();

        $data['validation_error'] = $validation;

        $data['form_add'] = 'Form_add';

        $data['form_update'] = false;

        $data['countries'] = $countries;

        return view('Users', $data);
    }

    public function addUser(){

        $data = [];

        $data_to_insert = $this->request->getPost();

        // var_dump($data_to_insert);die();

        $validation = $this->validate([
            'gender' => 'required|not_select_value[gender]',
            'age' => 'required|over_18[age]',
            'name' => 'required|alpha_space',
            'lastname' => 'required|alpha_space',
            'email' => 'required|valid_email',
            'address' => 'required|alpha_numeric_punct',
            'country' => 'required|not_select_value[country]',
            'state' => 'required|not_select_value[state]',
            'city' => 'required|not_select_value[city]',

        ]);

        $data['validation_error'] = $this->validator;

        if(!$validation){
            return redirect()->back()->withInput();
        }else{
            $insertData = new User();
            if($insertData->createUser($data_to_insert)){
                return redirect('list_users');
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function updateUser($id){

        $data = [];

        // var_dump($id);die();

        $data['validation_error'] = $this->validator;

        $data_to_update = $this->request->getPost();

        $data['form_add'] = false;

        $data['form_update'] = 'Form_update';

        unset($data_to_update['_method']);

        $validation = $this->validate([
            'gender' => 'required|not_select_value[gender]',
            'age' => 'required|over_18[age]',
            'name' => 'required|alpha_numeric_space',
            'lastname' => 'required|alpha_numeric_space',
            'email' => 'required|valid_email',
            'address' => 'required|alpha_numeric_punct',
            'country' => 'required|not_select_value[country]',
            'state' => 'required|not_select_value[state]',
            'city' => 'required|not_select_value[city]',
            'comment' => 'required',

        ]);

        if(!$validation){
            return redirect()->back()->withInput();
        }else{
            $inserData = new User();
            if($inserData->updateUser($id, $data_to_update)){
                return redirect('list_users');
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function indexUpdate($id){

        $validation =  \Config\Services::validation();

        $world = new World();

        $data = [];

        $data_to_update = new User();

        $data['data_update'] = $data_to_update->userById($id);

        $countries = $world->getAllCountries();

        $states = $world->getStateByCountry($data['data_update'][0]['country']);

        $city = $world->getCityByState($data['data_update'][0]['state']);


        $data['validation_error'] = $validation;

        $data['form_add'] = false;

        $data['form_update'] = 'Form_update';

        $data['genders'] = ['hombre', 'mujer', 'otro'];

        $data['type_resident'] = ['N/A' => 'Casa/Apartamento', 'Casa'=> 'Casa', 'Apartamento' => 'Apartamento'];

        $data['countries'] = $countries;

        $data['states'] = $states;

        $data['cities'] = $city;

        return view('Users', $data);

    }

    public function deleteUser($id){

        $deleteData = new User();
        if($deleteData->deleteUser($id)){
            return redirect('list_users');
        }
    }

    public function listUserJson(){
        $allUsers = new User();

        $allUsersJson['users'] = $allUsers->allUsersJson();

        header('Content-Type: application/json');

        return  '<pre style="word-wrap: break-word; white-space: pre-wrap;">' . json_encode($allUsersJson, JSON_PRETTY_PRINT) .'</pre>';
    }
}
