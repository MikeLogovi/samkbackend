@extends('admin.layouts.layout-basic')

@section('content')
<div class="main-content">
        @include("partials/page_header_breadcrumb",
         ['pageTitle'=>"Update team's member",
         'titleColor'=>'#43A047',
          'routeUrl'=>'teams.index',
          'routeParentName'=>'Team',
          'routeName'=>"Team's member Update",
          ])
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{route('teams.update',$team)}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="name">Member's name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? $team->name}}" placeholder="Put member's name here" >
                                 @if($errors->has('name'))
                                    <small class="text-danger">
                                    {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control"  >
                                     @foreach(config('samk.countries') as $country)
                                         @if($country==$team->country)
                                            <option value="{{$country}}" selected>{{$country}}</option>
                                         @else
                                            <option value="{{$country}}" >{{$country}}</option>
                                         @endif
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="10" class="form-control" id="description" name="description" placeholder='Put your description here' >
                                    {{old('description') ?? $team->description}}
                                </textarea>
                                @if($errors->has('description'))
                                    <small class="text-danger">
                                    {{$errors->first('description')}}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="source" class="custom-input">Member's picture</label>
                                <input type="file" class="form-control-file fileInput dd-none" name="source" id="source" >
                                @if($errors->has('source'))
                                    <small class="text-danger">
                                    {{$errors->first('source')}}
                                    </small>
                                @endif
                            </div>


                            @include('partials/form_button',['color'=>'success'])
                            

                        </form>


                        <div class="card">
                                    <div class="card-header bg-success">
                                        <h2 style="color:white">Socialites</h2>
                                        <div class="actions">
                                           <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createSocialite"><i class="icon-fa icon-fa-plus"></i>Add a new socialite</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       @foreach($team->socialites as $socialite)
                                        <div class="row">
                                             <label for="{{$socialite->icon}}" id="{{$socialite->icon}}">{{ucfirst($socialite->icon)}} <small class="text-muted"><a href="{{$socialite->url}}" target="_blank">({{$socialite->url}})</a></small></label>
                                             <button class="btn btn-warning" data-toggle="modal" data-target="updateSocialite{{$socialite->id}}">UPDATE</button>
                                            <form method="post" action="{{route('socialites.delete',$socialite->id)}}">
                                               {{csrf_field()}}
                                               {{method_field('DELETE')}}
                                             <button class="btn btn-danger" data-toggle="modal">DELETE</button> 
                                            </form>
                                        </div>
                                                    <div class="modal fade" id="updateSocialite{{$socialite->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <form method="post" action="{{route('socialites.update',$socialite)}}">
                                                                {{csrf_field()}}
                                                                {{method_field('PUT')}}
                                                                    <div class="modal-header bg-success">

                                                                        <h5 class="modal-title" id="exampleModalLabel">Update this link <small class="text-muted">{{$socialite->url}}</small></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="url" class="form-label">New link</label>
                                                                        <input type="text" class="form-control" name="url" id="url{{$socialite->id}}"/>
                                                                        @if($errors->has('url'))
                                                                                <small class="text-danger">
                                                                                {{$errors->first('url')}}
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
                                
                                        @endforeach
                                    </div>

                        </div>

                        <div class="modal fade" id="createSocialite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <form method="post" action="{{route('team.addSocialite',$team)}}">
                                          {{csrf_field()}}
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title" id="exampleModalLabel">Available socialites</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
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
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Send</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>







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