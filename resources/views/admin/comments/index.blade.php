@extends('admin.layouts.layout-basic')
@section('content')
@can('create',\App\Models\Comment::class)
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Comments</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                       
                        <a class="btn btn-success btn-sm" href="{{ route('comments.create')}}"><i class="fa fa-plus"></i>CREATE NEW COMMENT</a><br/><br/>

                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Picture</th>
                                <th>Author's name</th>
                                <th>Author's function</th>
                                <th>Comment</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($comments as $comment)
                             <tr>
                                 <td>
                                     
                                       <img src="{{asset('/storage/'.$comment->source)}}" width="250" height="150">
                                    
                                 </td>
                                 <td>{{$comment->author_name}}</td>
                                 <td>{{$comment->author_function}}</td>
                                 <td>{!! nl2br(e($comment->comment)) !!}</td>
                                 <td>{{$comment->updated_at}}</td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-4>
                                            <a class="btn btn-warning" href="{{ route('comments.edit',$comment)}}"><i class="icon-fa icon-fa-plus"></i>UPDATE</a>
                                         </div><br><br>
                                         <div class=col-xs-4 col-xs-offest-2>
                                            <form method='POST' action="{{route('comments.delete',$comment->id)}}">
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
@endcan
@stop
