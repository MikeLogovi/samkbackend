<?php

namespace App\Http\Controllers;

use App\Events\TeamCrud;
use App\Http\Requests\TeamFormRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('create',Team::class);
        $teams=Team::with('socialites')->orderBy('updated_at','desc')->get();
        return view('admin.teams.index',compact('teams'));
    }
    public function indexApi(){
        $teams=Team::with('socialites')->get();
        return response()->json($teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamFormRequest $request)
    {   $index=0;
        $urls=$request->urls;
        $this->authorize('create',Team::class);
        $path=fileUpload($request->file('source'),'teams');
        $user=Auth::user(); 
        $team=Team::create(['name'=>$request->name,
                        'country'=>$request->country,
                        'description'=>$request->description,
                        'user_id'=>Auth::user()->id,
                        'source'=>$path]);
        if($user->role!='admin'){
            $user->is_now_team_member=true;
            $user->save();
         }
        if($request->icons){
            foreach($request->icons as $icon){
                $team->socialites()->create([
                                'url'=>$urls[$index],
                                'icon'=>$icon
                ]);
                $index++;
            }
        }
        event(new TeamCrud('Member of team created successfully'));
        return redirect(route('teams.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin.teams.show',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->authorize('update',$team);
        if(!empty($request->name)){
            $team->name=$request->name;
        }
        if(!empty($request->country)){
            $team->country=$request->country;
        }
        if(!empty($request->description)){
            $team->description=$request->description;
        }
        if(!empty($request->hasFile('source'))){
            $this->validate($request,['source'=>'file|image']);
            $path=unlinkAndUpload($request->file('source'),$team->source,'teams');
            $team->source=$path;
        }
        $team->save();
        event(new teamCrud('Member of team profile updated successfully'));
        return redirect(route('teams.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team=Team::find($id);
        $this->authorize('delete',$team);
        Storage::disk('public')->delete($team->source);
        Team::destroy($id);
        event(new TeamCrud('Team deleted successfully'));
        return redirect(route('teams.index'));
    }
}
