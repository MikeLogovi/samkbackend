@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="/assets/admin/js/users/users.js"></script>
@stop

@section('content')
    <div class="main-content page-profile">
        <div class="page-header">
            <h3 class="page-title">User Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                <li class="breadcrumb-item active">{{$user->name}}</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tabs tabs-default">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#update" role="tab">Update</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="avatar-container">
                                            <img src="{{$user->picture ?? '/assets/admin/img/avatars/anonyme.png'}}" alt="Admin Avatar" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <h4>{{$user->name}}</h4>
                                            <p class="detail-row"><i class="icon-fa icon-fa-envelope-o"></i> {{$user->email}}</p>
                                             <a href="#" class="btn btn-bg btn-info" style='text-align:center;display:inline-block;width:200px'>{{ucfirst($user->role)}</a>
                                        </div>
                                    </div>    
                                 </div>

                                 <div class="tab-pane" id="update" role="tabpanel">
                                         
                                 <form method="POST" action="{{route('users.update',$user)}}" enctype="multipart/form-data"> 
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="name">New name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')?? $user->name}}" placeholder="Put user's name here" >
                                 @if($errors->has('name'))
                                    <small class="text-danger">
                                    {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
                           
                          
                            <div class="form-group">
                                <label for="source" class="custom-input">User's brand image</label>
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
    </div>
@stop
