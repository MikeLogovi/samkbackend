@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>"Add a new portfolio's category",
         'titleColor'=>'#4A148C',
          'routeUrl'=>'portfolio_categories.index',
          'routeParentName'=>"Portfolio's Category",
          'routeName'=>"Portfolio's Category Form Creation"
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('portfolio_categories.store')}}"> 
                      {{csrf_field()}}

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? ''}}" placeholder="Your portfolio's category name" required>
                                 @if($errors->has('name'))
                                    <small class="text-danger">
                                    {{$errors->first('name')}}
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
