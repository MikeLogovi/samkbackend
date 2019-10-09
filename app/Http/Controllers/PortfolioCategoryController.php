<?php

namespace App\Http\Controllers;

use App\Events\PortfolioCategoryCrud;
use App\Http\Requests\PortfolioCategoryRequest;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $portfolioCategories=PortfolioCategory::with('portfolio_images')->get();
        return view('admin.portfolio.categories.index',compact('portfolioCategories'));
    
    }
    public function indexApi()
    {   
        $portfolioCategories=PortfolioCategory::with('portfolio_images')->get();
        return response()->json($portfolioCategories);
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioCategoryRequest $request)
    {   Event::create($request->only('name'));
        event(new PortfolioCategoryCrud('The portolio category has been created successfully'));
        return redirect(route('portfolio_categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioCategory $portfolioCategory)
    {   
        return view('admin.portfolio.categories.show',compact('portfolioCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio.categories.edit',compact('portfolioCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {   if(!empty($request->name))
             $this->validate($request,[
                 'name'=>'unique:portfolio_categories'
             ]);
             $portfolioCategory->name=$request->name;
        $portfolioCategory->save();
        event(new PortfolioCategoryCrud('The portolio category has been updated successfully'));
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
        PortfolioCategory::destroy($id);
        event(new PortfolioCategoryCrud('The portolio category has been destroyed successfully'));
        return redirect(route('portfolio_categories.index'));
    }
}
