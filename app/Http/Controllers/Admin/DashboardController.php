<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered()
    {
      $users = User::all();
      return view('admin.register')->with('users', $users);
    }

    public function createuser()
    {
      $users = User::all();
      return view('admin.createuser')->with('users', $users);
    }

    public function store(Request $request)
    {
      $users = new User;

      $users->name = $request->input('name');
      $users->surname = $request->input('surname');
      $users->email = $request->input('email');
      $users->identity_Number = $request->input('identity_Number');
      $users->birthdate = $request->input('birthdate');
      $users->phone = $request->input('phone');
      $users->user_type = $request->input('user_type');
      $users->password = $request->input('password');


      $users->save();
      return redirect('/createuser')->with('success', 'Data Added for About Us');

    }

    public function registeredit(Request $request, $id)
    {
      $users = User::findOrFail($id);
      return view('admin.register-edit')->with('users', $users);
    }

    public function registerupdate(Request $request, $id)
    {
      $users = User::find($id);
      $users->name= $request->input('username');
      $users->user_type= $request->input('user_type');
      $users->phone= $request->input('phone');
      $users->email= $request->input('email');

      $users->update();

      return redirect('/role-register')->with('status', 'Your Data is Updated.');
    }

    public function registerdelete($id)
    {
      $users = User::findOrFail($id);
      $users->delete();

      return redirect('/role-register')->with('status', 'Your Data is Deleted.');

    }
}
