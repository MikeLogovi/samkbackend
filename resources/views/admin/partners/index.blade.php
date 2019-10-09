@extends('admin.layouts.layout-basic')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Partners</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                       <a class="btn btn-success" href="{{ route('partners.create')}}">CREATE NEW PARTNER</a><br/><br/>
                       <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Partner's logo</th>
                                <th>Name</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($partners as $partner)
                             <tr>
                                 <td>
                                    <img src="{{asset('/storage/'.$partner->source)}}" width="250" height="150">
                                 </td>
                                 <td>{{$partner->name}}</td>
                                 <td>{{$partner->updated_at}}</td>
                                 <td>{!! nl2br(e($partner->description)) !!}</td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-6>
                                            <a class="btn btn-warning" href="{{ route('partners.edit',$partner)}}">UPDATE</a>
                                         </div>&nbsp;&nbsp;
                                         <div class=col-xs-6 >
                                            <form method='POST' action="{{route('partners.delete',$partner->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                <button type='submit' class="btn btn-danger">DELETE</button>
                                            </form>                                           
                                         </div>
                                     </div>  
                                 </td>
                             </tr>
                             @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
