<?php

namespace App\Http\Controllers;

use App\Events\PartnerCrud;
use App\Http\Requests\PartnerFormRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('create',App\Models\Partner::class);
        $partners=Partner::orderBy('updated_at','DESC')->get();
        return view('admin.partners.index',compact('partners'));
    }
    public function indexApi()
    {
        $partners=Partner::orderBy('updated_at','DESC')->get();
        return  response()->json($partners);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerFormRequest $request)
    {
        $this->authorize('create',Partner::class);
        if($request->hasfile('source')&& $request->file('source')->isValid()){
            $path=fileUpload($request->file('source'),'partners');
            $user=Auth::user();
            $user->partners()->create(['name'=>$request->name,'source'=>$path]);
            event(new PartnerCrud('Partner created successfully'));
        }
        if($user->role!='admin'){
            $user->is_now_partner=true;
            $user->save();
         }
        return redirect(route('partners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {   
        $this->authorize('update',$partner);
        if(!empty($request->name)){
            $partner->name=$request->name;
         }
        
         if(!empty($request->source) && $request->hasFile('source') && $request->file('source')->isValid()){
             $path=unlinkAndUpload($request->file('source'),$partner->source,'partners');
             $partner->source=$path;
         }
         
         $partner->save();
         event(new PartnerCrud('Partner updated successfully'));
         return redirect(route('partners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $partner=Partner::findOrFail($id);
        $this->authorize('delete',$partner);
        Storage::disk('public')->delete($partner->source);
        Partner::destroy($id);
        event(new PartnerCrud('Partner deleted successfully'));
        return redirect(route('partners.index'));
    }
}
