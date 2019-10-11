@extends('admin.layouts.layout-basic')
@can('create',App\Models\Team::class)
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Teams</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                       <a class="btn btn-success" href="{{ route('teams.create')}}"><i class="icon-fa icon-fa-plus"></i>CREATE NEW TEAM'S MEMBER</a><br/><br/>
                       <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Socialites</th>
                                <th>Description</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($teams as $team)
                             <tr>
                                 <td>
                                       <img src="{{asset('/storage/'.$team->source)}}" width="250" height="150">
                                 </td>
                                 <td>{{$team->name}}</td>
                                 <td>{{$team->country}}</td>
                                 <td>
                                 @foreach($team->socialites as $socialite)
                                      <a href="{{$socialite->url}}"><i class="fa fa-{{$socialite->icon}}"></i></a>
                                 @endforeach
                                 </td>
                                 <td>{!! nl2br(e($team->description)) !!}</td>
                                 <td>{{$team->updated_at}}</td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-4>
                                            <a class="btn btn-warning" href="{{ route('teams.edit',$team)}}"><i class="icon-fa icon-fa-pencil"></i>UPDATE</a>
                                         </div><br><br>
                                         <div class=col-xs-4 col-xs-offest-2>
                                            <form method='POST' action="{{route('teams.delete',$team->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                <button type='submit' class="btn btn-danger"><i class="icon-fa icon-fa-trash"></i>DELETE</button>
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
@endcan
