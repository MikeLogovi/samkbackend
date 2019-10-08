@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>'Update this slider',
         'titleClass'=>'text-warning',
          'routeUrl'=>'sliders.index',
          'routeParentName'=>'Slider',
          'routeName'=>'Slider Update',
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method='POST' action="{{route('sliders.update',$slider)}}" enctype="multipart/form-data">
                      {{csrf_fielD()}}
                      {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$slider->title}}"
                                       placeholder="Your slider title">
                                 @if($errors->has('title'))
                                    <small class="text-danger">
                                    {{$errors->first('title')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea cols="30" rows="10" class="form-control" id="description" name="description">
                                    {{$slider->description}}
                                </textarea>
                                @if($errors->has('description'))
                                    <small class="text-danger">
                                    {{$errors->first('description')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="source">New media</label>
                                <input type="file" class="form-control-file fileInput" id="source" name="source"> 
                                @if($errors->has('source'))
                                    <small class="text-danger">
                                    {{$errors->first('source')}}
                                    </small>
                                @endif
                            </div>
                            @include('partials/form_button',['color'=>'warning'])

                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop
