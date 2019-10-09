@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>'Add a new video',
         'titleColor'=>'#4A148C',
          'routeUrl'=>'videos.index',
          'routeParentName'=>'Video',
          'routeName'=>'Video Form Creation',
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('videos.store')}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')?? ''}}" placeholder="Your video title" required>
                                 @if($errors->has('title'))
                                    <small class="text-danger">
                                    {{$errors->first('title')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="source">source</label>
                                <input type="text" class="form-control" id="source" name="source" value="{{old('source')?? ''}}" placeholder="Your youtube video here" required>
                                 @if($errors->has('source'))
                                    <small class="text-danger">
                                    {{$errors->first('source')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="10" class="form-control" id="description" name="description" placeholder='Describe your video'>
                                    {{old('description')}}
                                </textarea>
                                @if($errors->has('description'))
                                    <small class="text-danger">
                                    {{$errors->first('description')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="brand_image">Your video's brand image</label>
                                <input type="file" class="form-control-file fileInput " name="brand_image" id="brand_image">
                                @if($errors->has('brand_image'))
                                    <small class="text-danger">
                                    {{$errors->first('brand_image')}}
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
