<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use Input;
use Request;
class AccountController extends Controller
{
    public function login()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();
            print_r($data);
            die;
        }
    }
}