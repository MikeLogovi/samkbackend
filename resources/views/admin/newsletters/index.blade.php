@extends('admin.layouts.layout-basic')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Newsletters</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>All Emails</h6>

                        <div class="card-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="users-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Registered On</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach($newsletters as $newsletter)
                            <tr>
                                <td>{{$newsletter->email}}</td>
                                <td>{{$newsletter->created_at}}</td>
                                <td>
                                    <form method="POST" action="{{route('newsletters.destroy',$newsletter)}}" style="display:inline">
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
