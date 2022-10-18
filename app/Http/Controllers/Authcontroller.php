<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function me(){
        return [
            'Nis' => 3103120166,
            'Name' => 'Nizar Ali Rifai',
            'Phone' => '0896 7876 5674',
            'Class' => 'XII RPL 5'
        ];
    }
}
