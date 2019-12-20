<?php

namespace App\Http\Controllers;

use App\Events\EventCrud;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $events=Event::orderBy('updated_at','DESC')->get();
        return view('admin.events.index',compact('events'));
    }
    public function indexApi()
    {   
        $events=Event::orderBy('updated_at','DESC')->get();
        return response()->json($events);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventFormRequest $request)
    {  
         if($request->hasfile('source')&& $request->file('source')->isValid()){
            $path=fileUpload($request->file('source'),'events');
            $myEvent=Event::create(  ['name'=>$request->name,
                            'description'=>$request->description,
                            'event_date'=>$request->event_date,
                            'source'=>$path,
                            'price'=>$request->price]);
            event(new EventCrud('Event created successfully',$myEvent));
         }
       
        return redirect(route('events.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {   if(!empty($request->name)){
            $this->validate($request,['name'=>'unique:partners']);
            $event->name=$request->name;
        }
           
        if(!empty($request->description))
            $event->description=$request->description;
        if(!empty($request->event_date))
            $event->event_date=$request->event_date;
        if(!empty($request->source) &&$request->hasFile('source')&& $request->file('source')->isValid()){
            $this->validate($request,[
                'source'=>'file|image|mimes:png,jpeg,jpg,gif,bmp'
            ]) ;
            $path=unlinkAndUpload($request->file('source'),$event->source,'events');
            $event->source=$path;

        }
        
        if(!empty($request->price)){
            $this->validate($request,[
                'price'=>'between:0,1000000000'
            ]) ;
            $event->price=$request->price;
        }
        $event->save();
        event(new EventCrud('Event updated successfully'));
        return redirect(route('events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $event=Event::find($id);
        Storage::disk('public')->delete($event->source);
        Event::destroy($id);
        event(new EventCrud('Event deleted successfully'));
        return redirect(route('events.index'));
    }
}
