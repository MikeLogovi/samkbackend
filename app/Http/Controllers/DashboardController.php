<?php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index() 
    {
        return redirect()->route('admin.dashboard.basic');
    }

    public function basic() 
    {    
         $bigData=initializeData();
         return view('admin.dashboard.basic',compact('bigData'));
    }

    public function ecommerce() 
    {
        return view('admin.dashboard.ecommerce');
    }

    public function finance() 
    {
        return view('admin.dashboard.finance');
    }
}
