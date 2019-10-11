<?php

namespace App\Http\Controllers;

use App\Events\SliderCrud;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $sliders=Slider::orderBy('updated_at','DESC')->get();
       
        return view('admin.sliders.index',compact('sliders'));
    }
     public function indexApi(){
        $sliders=Slider::orderBy('updated_at','DESC')->get();
        return response()->json($sliders);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderFormRequest $request)
    {   
        if($request->hasfile('source')&& $request->file('source')->isValid()){
            $path=fileUpload($request->file('source'),'sliders');
            Slider::create(['title'=>$request->title,'description'=>$request->description,'source'=>$path]);
            event(new SliderCrud('Slider created successfully'));
        }
        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit',compact('slider'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {   //dd('What the fuck');
        
        if(!empty($request->title)){
          
           $slider->title=$request->title;
        }
        if(!empty($request->description)){
            $slider->description=$request->description;
        }
        if(!empty($request->source) && $request->hasFile('source') && $request->file('source')->isValid()){
            $this->validate($request,['source'=>'mimes:mp4,avi,mpeg,quicktime,jpeg,bmp,png,jpg']);
            $path=unlinkAndUpload($request->file('source'),$slider->source,'sliders');
            $slider->source=$path;
        }
        
        $slider->save();
        event(new SliderCrud('Slider updated successfully'));
        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $slider=Slider::find($id);
        Storage::disk('public')->delete($slider->source);

        Slider::destroy($id);
        event(new SliderCrud('Slider deleted successfully'));
        return redirect(route('sliders.index'));
    }
}
