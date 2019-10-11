<?php
namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {   
        $this->authorize('create',User::class);

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
        $this->authorize('delete',$user);
        $user->delete();
        session()->flash('message','User Deleted successfully');

        return redirect()->back();
    }
    public function givePermissions(User $user){
        $user->creations_can_be_published=true;
        $user->save();
        session()->flash('message',"The".$user->role.' '.$user->name." will have now his publications available");
        return redirect(route('users.index'));
    }
    public function deletePermissions(User $user){
        $user->creations_can_be_published=false;
        $user->save();
        session()->flash('message',"The".$user->role.' '.$user->name." can't have his publications available now");
        return redirect(route('users.index'));
    }
}
