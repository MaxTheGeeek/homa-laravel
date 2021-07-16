<?php


namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class HomeController extends Controller
{

    public function index()
    {
        return view('app.pages.home');
    }

    public function show()
    {

    }
}
