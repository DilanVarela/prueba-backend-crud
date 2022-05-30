<?php

namespace App\Controllers;

use App\Models\User;

use App\Models\World;

class HomeController extends BaseController
{
    public function index()
    {   

        $allData = new User();

        $world = new World();

        $data = [];

        $data['allData'] = $allData->paginate(5);

        foreach($data['allData'] as $key => $value){
            $data['allData'][$key]['gender'] = ucfirst($data['allData'][$key]['gender']);
            $data['allData'][$key]['country'] = $world->getCountryByID($data['allData'][$key]['country']);
            $data['allData'][$key]['state'] = $world->getStateByID($data['allData'][$key]['state']);
            $data['allData'][$key]['city'] = $world->getCityByID($data['allData'][$key]['city']);
        }

        $data['pager'] = $allData->pager;

        $data['mostRegistersCities'] = $allData->mostRegistersCities();

        return view('Home', $data);
    }
}