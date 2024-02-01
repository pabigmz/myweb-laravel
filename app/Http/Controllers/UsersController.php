<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(): view
    {
        $users = User::orderBy('id','asc')->where('is_admin',null)->paginate(5);
        return view('users.index',  compact('users'));
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect()->back()->withSuccess('User deleted successfully');
    }
}
