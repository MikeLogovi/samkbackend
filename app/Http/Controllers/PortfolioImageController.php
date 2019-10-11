<?php

namespace App\Http\Controllers;

use App\Events\PortfolioImageCrud;
use App\Http\Requests\PortfolioImageRequest;
use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $portfolioImages=PortfolioImage::orderBy('updated_at','DESC')->get();
        
        return view('admin.portfolio.images.index',compact('portfolioImages'));
    }
    public function indexApi(){
        $portfolioImages=PortfolioImage::orderBy('updated_at','DESC')->get();
        return response()->json($portfolioImages);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolioCategories=PortfolioCategory::all();
        return view('admin.portfolio.images.create',compact('portfolioCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioImageRequest $request)
    {
        $portfolioCategory=PortfolioCategory::findOrFail($request->portfolio_category_id);
        if($request->hasfile('source')&& $request->file('source')->isValid() ){
            $path=fileUpload($request->file('source'),'portfolio');
            $portfolioCategory->portfolio_images()->create([
                  'title'=>$request->title,'source'=>$path
            ]);  
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
    public function edit(PortfolioCategory $portfolioCategory,  PortfolioImage $portfolioImage)
    {   $portfolioCategories=PortfolioCategory::all();
        return view('admin.portfolio.images.edit',compact('portfolioImage','portfolioCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PortfolioCategory $portfolioCategory,PortfolioImage $portfolioImage)
    {
        if(!empty($request->portfolio_category_id)){
            $portfolioCategory=PortfolioCategory::findOrFail($request->portfolio_category_id);
            $portfolioImage->portfolio_category_id=$portfolioCategory->id;
        }
        if(!empty($request->title)){
       
            $portfolioImage->title=$request->title;
        }
         if(!empty($request->source) && $request->hasFile('source') && $request->file('source')->isValid()){
             $this->validate($request,[
                 'source'=>'file|image'
             ]);
             $path=unlinkAndUpload($request->file('source'),$portfolioImage->source,'portfolio');
             $portfolioImage->source=$path;
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
        $portfolioImage=PortfolioImage::find($id);
        Storage::disk('public')->delete($portfolioImage->source);
        PortfolioImage::destroy($id);
        event(new PortfolioImageCrud('Image deleted successfully'));
        return redirect(route('portfolio_categories.index'));
    }
}
