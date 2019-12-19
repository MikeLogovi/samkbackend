<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    public function index()
    {   
        //$this->authorize('create',User::class);

        $users = User::orderBy('updated_at','DESC')->get();

        return view('admin.users.index')->with('users', $users);
    }

    public function show(User $user)
    {
        return view('admin.users.show')->with('user', $user);
    }
    public function update(Request $request,User $user){
        
        if(!empty($request->name)){
       
            $user->name=$request->name;
        }
         if(!empty($request->source) && $request->hasFile('source') && $request->file('source')->isValid()){
             $this->validate($request,[
                 'source'=>'file|image'
             ]);
             if($user->picture)
                $path=unlinkAndUpload($request->file('source'),$user->picture,'users');
             else
                $path=fileUpload($request->file('source'),'portfolio');
             $user->picture=$path;
         }
         
         $user->save();
         session()->flash('message','User updated successfully');
        return redirect()->back();
    }
    public function destroy(User $user)
    {   
        $this->deletePicture($user);
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
    public function disablePermissions(User $user){
        $user->creations_can_be_published=false;
        $user->save();
        session()->flash('message',"The".$user->role.' '.$user->name." can't have his publications available now");
        return redirect(route('users.index'));
    }
    private function deletePicture(User $user){
         if($user->picture){
             Storage::disk('public')->delete($user->picture);
         }
        $user->picture=null;
        $user->save();
        session()->flash('message',"The".$user->role.' '.$user->name." 's picture has been deleted successfully");
        return redirect()->back();
    }
}
