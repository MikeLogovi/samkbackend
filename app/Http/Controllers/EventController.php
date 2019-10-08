<?php

namespace App\Http\Controllers;

use App\Events\EventCrud;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $events=Event::all();
        return view('admin.events.index',compact('events'));
    }
    public function indexApi()
    {   
        $events=Event::all();
        return response()->json($events);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.index');
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
            Event::create(  ['name'=>$request->name,
                            'description'=>$request->description,
                            'event_date'=>$request->event_date,
                            'source'=>$path,
                            'price'=>$request->price]);
            event(new EventCrud('Event created successfully'));
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
    {   if(!empy($request->name))
            $event->name=$request->name;
        if(!empty($request->description))
            $event->description=$request->description;
        if(!empty($request->event_date))
            $event->event_date=$request->event_date;
        if(!empty($request->source))
            $path=unlinkAndUpload($request->file('source'),'events');
            $event->source=$request->source;
        if(!empty($request->price))
            $event->price=$request->price;
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
        unlinkFile($event->source);
        $event->delete();
        event(new EventCrud('Event deleted successfully'));
        return redirect(route('events.index'));
    }
}
