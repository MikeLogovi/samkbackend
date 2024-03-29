@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>'Update comment',
         'titleColor'=>'#43A047',
          'routeUrl'=>'comments.index',
          'routeParentName'=>'Comment',
          'routeName'=>'Comment Update',
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('comments.update',$comment)}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="author_name">Author's full name</label>
                                <input type="text" class="form-control" id="author_name" name="author_name" value="{{old('author_name')?? $comment->author_name}}" placeholder="Put the author's name here">
                                 @if($errors->has('author_name'))
                                    <small class="text-danger">
                                    {{$errors->first('author_name')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="author_function">Author's function</label>
                                <select name="author_function" id="author_function" class="form-control">
                                     @foreach(config('samk.comments.author_functions') as $job)
                                         @if($job==$comment->author_function)
                                            <option value="{{$job}}" selected>{{$job}}</option>
                                         @else
                                            <option value="{{$job}}" >{{$job}}</option>
                                         @endif
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea rows="10" class="form-control" id="comment" name="comment" placeholder='Put your comment here'>
                                    {{old('comment') ?? $comment->comment}}
                                </textarea>
                                @if($errors->has('comment'))
                                    <small class="text-danger">
                                    {{$errors->first('comment')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="source" class="custom-input">Author's picture</label>
                                <input type="file" class="form-control-file fileInput d-none" name="source" id="source">
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
