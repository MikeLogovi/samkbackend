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
                                            <p class="detail-row"><i class="icon-fa icon-fa-birthday-cake"></i> September 7, 1991</p>
                                            <p class="detail-row"><i class="icon-fa icon-fa-wrench"></i> UI Designer / Pro Model</p>
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
