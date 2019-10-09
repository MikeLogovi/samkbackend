@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>'Update partner',
         'titleColor'=>'#43A047',
          'routeUrl'=>'partners.index',
          'routeParentName'=>'Partner',
          'routeName'=>'Partner Update',
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('partners.store')}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="name">Partner's name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? ''}}" placeholder="Put partner's name here" required>
                                 @if($errors->has('name'))
                                    <small class="text-danger">
                                    {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>  
                            
                            <div class="form-group">
                                <label for="source" class="custom-input">Partner's brand image</label>
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
