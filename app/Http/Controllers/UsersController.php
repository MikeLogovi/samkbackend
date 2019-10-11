<?php
namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('updated_at','DESC')->get();

        return view('admin.users.index')->with('users', $users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show')->with('user', $user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('message','User Deleted successfully');

        return redirect()->back();
    }
}
