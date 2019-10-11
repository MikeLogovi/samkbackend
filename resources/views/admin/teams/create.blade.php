@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>"Add a new team's member",
         'titleColor'=>'#43A047',
          'routeUrl'=>'teams.index',
          'routeParentName'=>'Team',
          'routeName'=>"Team's member Form Creation",
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('teams.store')}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}

                            <div class="form-group">
                                <label for="name">Member's name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? ''}}" placeholder="Put member's name here" required>
                                 @if($errors->has('name'))
                                    <small class="text-danger">
                                    {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control"  required>
                                     @foreach(config('samk.countries') as $country)
                                         @if($country=='Algeria')
                                            <option value="{{$country}}" selected>{{$country}}</option>
                                         @else
                                            <option value="{{$country}}" >{{$country}}</option>
                                         @endif
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="10" class="form-control" id="description" name="description" placeholder='Put your description here' required>
                                    {{old('description')}}
                                </textarea>
                                @if($errors->has('description'))
                                    <small class="text-danger">
                                    {{$errors->first('description')}}
                                    </small>
                                @endif
                            </div>

                            <div class="card">
                                    <div class="card-header bg-success">
                                        <h2 style="color:white">Socialites</h2>
                                    </div>
                                    <div class="card-body">
                                       @foreach(config('samk.socialites') as $socialite)
                                        <div class="form-group">
                                             <input type="checkbox" id="{{$socialite['name']}}" value="{{$socialite['name']}}" name="icons[]" class="checkboxes">
                                             <label for="{{$socialite['name']}}" id="{{$socialite['name']}}">{{ucfirst($socialite['name'])}}</label>
                                             <input type="text" class="form-control" id="url{{$socialite['name']}}" name="urls[]" value="{{old('url')?? ''}}" placeholder="Member's {{$socialite['name']}} account url here" style="display:none" >
                                            @if($errors->has('url'))
                                                <small class="text-danger">
                                                {{$errors->first('url')}}
                                                </small>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>

                            </div>
 
                            <div class="form-group">
                                <label for="source" class="custom-input">Member's picture</label>
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
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
         $('.checkboxes').click(function(){
              if(!$(this).prop('checked')){
                  $(this).parent().children("input:text").hide(200);
              }else{
                $(this).parent().children("input:text").show(200);
              }
         });
   })
</script>
@stop