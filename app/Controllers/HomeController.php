<?php

namespace App\Controllers;

use App\Models\User;


class HomeController extends BaseController
{
    public function index()
    {   
        $allData = new User();

        $data = [];

        $data['allData'] = $allData->allUsers();

        $data['mostRegistersCities'] = $allData->mostRegistersCities();

        return view('Home', $data);
    }
}