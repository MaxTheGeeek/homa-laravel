<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class HomeController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }
}
