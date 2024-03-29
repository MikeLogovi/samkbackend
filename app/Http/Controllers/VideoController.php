<?php

namespace App\Http\Controllers;

use App\Events\VideoCrud;
use App\Http\Requests\VideoFormRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $videos=Video::orderBy('updated_at','DESC')->get();
      return view('admin.videos.index',compact('videos'));
    }
    public function indexApi()
    {
      $videos=Video::orderBy('updated_at','DESC')->get();
      return response()->json($videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoFormRequest $request)
    {   
        $path=fileUpload($request->file('brand_image'),'videos');
        Video::create(['title'=>$request->title,'description'=>$request->description,'brand_image'=>$path,'source'=>$request->source]);
        event(new VideoCrud('Video created successfully'));
        return redirect(route('videos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.video.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        if(!empty($request->title)){           
            $video->title=$request->title;
        }
        if(!empty($request->description)){
            $video->description=$request->description;
        }
        if(!empty($request->source)){
            $video->source=$request->source;
        }
        if(!empty($request->hasFile('brand_image'))){
            $this->validate($request,['brand_image'=>'file|image']);
            $path=unlinkAndUpload($request->file('brand_image'),$video->brand_image,'videos');
            $video->brand_image=$path;
        }
        $video->save();
        event(new VideoCrud('Video updated successfully'));
        return redirect(route('videos.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video=Video::find($id);
        Storage::disk('public')->delete($video->brand_image);
        video::destroy($id);
        event(new VideoCrud('Video deleted successfully'));
        return redirect(route('videos.index'));
    }
}
