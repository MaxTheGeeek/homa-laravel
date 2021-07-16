<?php


namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        //get all users from db

        $users = User::all();

//        or only avtive users
//        $users = User::where('status', 'activate')->get();

        return view('admin.pages.user.list', ['users' => $users]);
    }


    public function setRoles(Request $request)
    {

        //get the user,we want to change the role
        $user = User::firstWhere('id', $request->user);

        //change the role
        $user->role = $request->role;


        //save to db or faild
        try {
            $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }
        return redirect()->back()->with('Success', 'Role changed successfully');
    }


    public function status(Request $request)
    {
        $user = User::firstWhere('id', $request->user);

        if ($user->status === 'activate')
            $user->status = 'deactivate';
        else
            $user->status = 'activate';


        try {
            $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }
        return redirect()->back()->with('Success', 'Status changed successfully');


    }


    public function create()
    {
        $managers = User::where('role', 'manager')->get();
        return view('admin.pages.user.newUser',['managers'=>$managers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->password  = Hash::make($request->password);
        $user->manager   = $request->manager;
        $user->role      = 'user';

        try {
            $user->save();
        }
        catch (\Exception $e) {

            return redirect()->back()->with('warning', $e->getMessage());
        }
        return redirect()->back()->with('success', 'Added successfully');
    }
}
