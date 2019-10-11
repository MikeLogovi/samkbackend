@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>'Add a new event',
         'titleColor'=>'#43A047',
          'routeUrl'=>'events.index',
          'routeParentName'=>'Event',
          'routeName'=>'Event Form Creation',
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('events.store')}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}

                            <div class="form-group">
                                <label for="name">Event's name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? ''}}" placeholder="Put event's name here" required>
                                 @if($errors->has('name'))
                                    <small class="text-danger">
                                    {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Event's price(DA)</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{old('price')?? ''}}" placeholder="Put event's price here" required>
                                 @if($errors->has('price'))
                                    <small class="text-danger">
                                    {{$errors->first('price')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="event_date">Event's date(DA)</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" value="{{old('event_date')?? ''}}" placeholder="Event's date is here" required>
                                 @if($errors->has('event_date'))
                                    <small class="text-danger">
                                    {{$errors->first('event_date')}}
                                    </small>
                                @endif
                            </div>
                           
                            <div class="form-group">
                                <label for="description" >Description</label>
                                <textarea rows="10" class="form-control" id="description" name="description" placeholder='Put your description here' required>
                                    {{old('description')}}
                                </textarea>
                                @if($errors->has('description'))
                                    <small class="text-danger">
                                    {{$errors->first('description')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="source" class="custom-input">Event's brand image</label>
                                <input type="file" class="form-control-file fileInput dd-none" name="source" id="source" required>
                                @if($errors->has('source'))
                                    <small class="text-danger">
                                    {{$errors->first('source')}}
                                    </small>
                                @endif
                            </div>
                            @include('partials/form_button',['color'=>'success'])
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
