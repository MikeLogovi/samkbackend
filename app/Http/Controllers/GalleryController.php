<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GalleryController extends Controller
{
    public function indexApi(Request $request){
         
          $images=DB::table('portfolio_images')->orderBy('created_at')->get()->toArray();
   
          return response()->json($images);
    }
}
