@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="/assets/admin/js/users/users.js"></script>
@stop

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Users</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>All Users</h6>

                        <div class="card-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="users-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registered On</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    @if(!$user->creations_can_be_published)
                                        <a href="{{route('users.give_permissions',$user)}}" class="btn btn-info btn-sm"><i class="icon-fa icon-fa-check"></i>GIVE PERMISSIONS</a>
                                    @else
                                       <a href="{{route('users.disable_permissions',$user)}}" class="btn btn-warning btn-sm"><i class="icon-fa icon-fa-times"></i> DISABLE PERMISSIONS</a>
                                    @endif
                                    <a href="{{route('users.show',$user)}}" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-search"></i> View</a>
                                    
                                    <form method="POST" action="{{route('users.destroy',$user)}}" style="display:inline">
                                        <button class="btn btn-danger btn-sm" type="submit"> <i class="icon-fa icon-fa-trash"></i> Delete</button>
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
