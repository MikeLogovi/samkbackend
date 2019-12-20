@extends('admin.layouts.layout-basic')
@section('content')

    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Messages</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                        <ul class="media-list activity-list">
                            @foreach($messages as $message)
                             <li class="media">
                                <div class="media-body">
                                      <h4 class="media-heading">{{$message->author_name}} <span>sent a message</span></h4>
                                        <small>{{$message->created_at}}</small>
                                            <p class="mt-2">"{{$message->content}}"</p>
                                 </div>
                                 <div class="media-footer">
                                     <button class="btn btn-success" data-toggle="modal" data-target="#modal{{$message->id}}">Respond</button>
                                 </div>
                                 <div class="modal fade" id="modal{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <form method="post" action="{{route('response.send',$message)}}">
                                          {{csrf_field()}}
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title" id="exampleModalLabel" style="color:white">Reply to {{$message->author_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="content">Response</label>
                                                    <textarea rows="10" class="form-control" id="content" name="content" placeholder='Put your content here' >
                                                        
                                                    </textarea>
                                                    @if($errors->has('content'))
                                                        <small class="text-danger">
                                                        {{$errors->first('content')}}
                                                        </small>
                                                    @endif
                                                </div>

                                       


                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Send</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </li>
                            
                               
                            @endforeach          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
