<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!in_array(auth()->user()->role,['admin', 'manager'])) {

          return redirect()->route('admin.pages.setting');
        }
        return view('It is setting');
    }
}
