<?php

namespace App\Http\Controllers;

use App\Events\PartnerCrud;
use App\Http\Requests\PartnerFormRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners=Partner::all();
        return view('admin.partners.index',compact('partners'));
    }
    public function indexApi()
    {
        $partners=Partner::all();
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
        if($request->hasfile('source')&& $request->file('source')->isValid()){
            $path=fileUpload($request->file('source'),'partners');
            Partner::create(['name'=>$request->name,'source'=>$path]);
            event(new PartnerCrud('Partner created successfully'));
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
        if(!empty($request->name)){
            $this->validate($request,['name'=>'unique:partners']);
            $partner->name=$request->name;
         }
        
         if(!empty($request->source) && $request->hasFile('source') && $request->file('source')->isValid()){
             $path=unlinkAndUpload($request->file('source'),'partners');
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
        unlinkFile((Partner::find($id))->source);
        Partner::destroy($id);
        event(new PartnerCrud('Partner deleted successfully'));
        return redirect(route('partners.index'));
    }
}
