@extends('admin.layouts.layout-basic')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Events</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                       <a class="btn btn-success" href="{{ route('events.create')}}">CREATE NEW EVENT</a><br/><br/>
                       <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Brand image</th>
                                <th>Event's name</th>
                                <th>Price(DA)</th>
                                <th>Organised at</th>
                                <th>Description</th>
                                <th>Updated at</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($events as $event)
                             <tr>
                                 <td>
                                       <img src="{{asset('/storage/'.$event->source)}}" width="250" height="150">
                                 </td>
                                 <td>{{$event->name}}</td>
                                 <td>{{$event->price}}</td>
                                 <td>{{$event->event_date}}</td>
                                 <td>{!! nl2br(e($event->description)) !!}</td>
                                 <td>{{$event->updated_at}}</td>
                                 <td> <button class="btn btn-{{getStatusClass($event->status)}}">{{$event->status}}</button>  </td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-4>
                                            <a class="btn btn-warning" href="{{ route('events.edit',$event)}}">UPDATE</a>
                                         </div><br><br>
                                         <div class=col-xs-4 col-xs-offest-2>
                                            <form method='POST' action="{{route('events.delete',$event->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                <button type='submit' class="btn btn-danger">DELETE</button>
                                            </form>                                           
                                         </div>
                                     </div>  
                                 </td>
                             </tr>
                             @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
