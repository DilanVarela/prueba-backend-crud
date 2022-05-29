<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\World;

class WorldController extends BaseController
{
    public function getStateByCountry($id = "1")
    {
        $state = new World();
        $state = $state->getStateByCountry($id);

        return json_encode($state);
    }

    public function getStateByID($id = "1")
    {
        $state = new World();
        $state = $state->getStateByID($id);

        return json_encode($state);
    }

    public function getCityByState($id = "1")
    {
        $state = new World();
        $state = $state->getCityByState($id);

        return json_encode($state);
    }

    public function getCityByID($id = "1")
    {
        $state = new World();
        $state = $state->getCityByID($id);

        return json_encode($state);
    }

}
