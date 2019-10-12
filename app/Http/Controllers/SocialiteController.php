<?php

namespace App\Http\Controllers;

use App\Events\Socialite;
use App\Models\Team;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    //No need
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        retu
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$team)
    {
        $
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socialite $socialite)
    {
        if(!empty($request->url))
            $socialite->url=$request->url;
        session()->flash('message','Socialite updated successfully');
        retur redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Socialite::destroy($id);
        session()->flash('message','Socialite deleted successfully');
        return redirect()->back();
    }
}
