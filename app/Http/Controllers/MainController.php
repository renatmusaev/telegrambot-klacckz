<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {

        $data = json_decode(file_get_contents('php://input'), true);
        file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);

        dd($data);

        return "Hello!";
    }
}
