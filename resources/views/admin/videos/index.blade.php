@extends('admin.layouts.layout-basic')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Videos</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                       <a class="btn btn-success" href="{{ route('videos.create')}}">CREATE NEW VIDEO</a><br/><br/>
                       <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Brand image</th>
                                <th>Video</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Updated at</th>
                                
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($videos as $video)
                             <tr>
                                 <td>
                                       <img src="{{asset('/storage/'.$video->brand_image)}}" width="250" height="150">
                                 </td>
                                 <td>
                                   <iframe width="250" height="150" src="{{$video->source}}" autoplay="false" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" ></iframe>
                                 </td>
                                 <td>{{$video->title}}</td>
            
                                 <td>{!! nl2br(e($video->description)) !!}</td>
                                 <td>{{$video->updated_at}}</td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-4>
                                            <a class="btn btn-warning" href="{{ route('videos.edit',$video)}}">UPDATE</a>
                                         </div><br><br>
                                         <div class=col-xs-4 col-xs-offest-2>
                                            <form method='POST' action="{{route('videos.delete',$video->id)}}">
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
