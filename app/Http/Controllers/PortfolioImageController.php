<?php

namespace App\Http\Controllers;

use App\Events\PortfolioImageCrud;
use App\Http\Requests\PortfolioImageRequest;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
{
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
        return view('admin.portfolio.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioImageRequest $request)
    {
        if($request->hasfile('source')&& $request->file('source')->isValid()){
            $path=fileUpload($request->file('source'),'portfolio');
            PortfolioImage::create(['title'=>$request->title,'source'=>$path]);
            event(new PortfolioImageCrud('Image created successfully'));
        }
        return redirect(route('portfolio_categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioImage $portfolioImage)
    { 
        return view('admin.portfolio.images.show',compact('portfolioImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioImage $portfolioImage)
    {
        return view('admin.portfolio.images.edit',compact('portfolioImage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioImage $portfolioImage)
    {
        if(!empty($request->title)){
            $portfolioImage->title=$request->title;
        }
         if(!empty($request->source) && $request->hasFile('source') && $request->file('source')->isValid()){
             $path=unlinkAndUpload($request->file('source'),'portfolio');
             $slider->source=$path;
         }
         
         $portfolioImage->save();
         event(new PortfolioImageCrud('Image updated successfully'));
         return redirect(route('portfolio_categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unlinkFile((PortfolioImage::find($id))->source);
        PortfolioImage::destroy($id);
        event(new PortfolioImageCrud('Imagedeleted successfully'));
        return redirect(route('sliders.index'));
    }
}
