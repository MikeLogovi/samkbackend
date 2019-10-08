@extends('admin.layouts.layout-basic')
@inject('file','App\Services\File')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Sliders</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                       <a class="btn btn-success" href="{{ route('sliders.create')}}">CREATE NEW SLIDER</a><br/><br/>
                       <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Media</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($sliders as $slider)
                             <tr>
                                 <td>
                                     @if($file->isImage($slider->source))
                                       <img src="{{asset('/storage/'.$slider->source)}}" width="250" height="150">
                                     @elseif($file->isVideo($slider->source))
                                        <iframe width="250" height="150" src="{{asset('/storage/'.$slider->source)}}" autoplay="false" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" ></iframe>
                                     @endif
                                 </td>
                                 <td>{{$slider->title}}</td>
                                 <td>{{$slider->description}}</td>
                                 <td>{{$slider->updated_at}}</td>
                                 <td>{!! nl2br(e($slider->description)) !!}</td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-4>
                                            <a class="btn btn-warning" href="{{ route('sliders.edit',$slider)}}">UPDATE</a>
                                         </div><br><br>
                                         <div class=col-xs-4 col-xs-offest-2>
                                            <form method='POST' action="{{route('sliders.delete',$slider->id)}}">
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
