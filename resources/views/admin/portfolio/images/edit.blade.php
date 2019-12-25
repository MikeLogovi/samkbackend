@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>'Update image',
         'titleColor'=>'#43A047',
          'routeUrl'=>'portfolio_images.index',
          'routeParentName'=>'Image',
          'routeName'=>'Image Update',
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('portfolio_images.update',[$portfolioImage->portfolio_category,$portfolioImage])}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="title">Portfolio image's title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')?? $portfolioImage->title}}" placeholder="Put image's title here" >
                                 @if($errors->has('title'))
                                    <small class="text-danger">
                                    {{$errors->first('title')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="portfolio_category_id">Portfolio's categories</label>
                                <select name="portfolio_category_id" id="portfolio_category_id" class="form-control" >
                                     @foreach($portfolioCategories as $portfolioCategory)
                                         @if($portfolioImage->portfolio_category->name==$portfolioCategory->name)
                                            <option value="{{$portfolioCategory->id}}" selected>{{$portfolioCategory->name}}</option>
                                         @else
                                            <option value="{{$portfolioCategory->id}}" >{{$portfolioCategory->name}}</option>
                                         @endif
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="source" class="custom-input">Image</label>
                                <input type="file" class="form-control-file fileInput dd-none" name="source" id="source" >
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
