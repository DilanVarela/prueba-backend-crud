<?php

namespace App\Validation;

use Carbon\Carbon;

class CustomRules
{
    public function over_18(string $data): bool
    {
        $age = Carbon::parse(str_replace('/', '-',$data))->diffInYears(\Carbon\Carbon::now());
        if($age < 18){
            return false;
        }
        return true;
    }

    public function not_select_value(string $data): bool
    {
        if($data === 'select'){
            return false;
        }
        return true;
    }
}
