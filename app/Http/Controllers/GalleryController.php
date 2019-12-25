<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GalleryController extends Controller
{
    public function indexApi(Request $request){
          $number=($request->query('group')+1)*10;
          $images=DB::table('portfolio_images')->orderBy('created_at')->limit($number)->get();
          return response()->json($images);
    }
}
