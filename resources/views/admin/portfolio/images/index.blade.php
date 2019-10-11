
@extends('admin.layouts.layout-basic')

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Portfolio's Images</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                       <a class="btn btn-success" href="{{ route('images.create')}}"><i class="icon-fa icon-fa-plus"></i>CREATE NEW IMAGE</a><br/><br/>
                       <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($portfolioImages as $portfolioImage)
                             <tr>
                                 <td>
                                       <img src="{{asset('/storage/'.$portfolioImage->source)}}" width="250" height="150">
                                 </td>
                                 <td>{{$portfolioImage->title}}</td>
                                 <td>{{$portfolioImage->portfolio_category->name}}</td>
                                 <td>{{$portfolioImage->updated_at}}</td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-4>
                                            <a class="btn btn-warning" href="{{ route('portfolio_images.edit',[$portfolioImage->portfolio_category,$portfolioImage])}}"><i class="icon-fa icon-fa-pencil"></i>UPDATE</a>
                                         </div>&nbsp;&nbsp;
                                         <div class=col-xs-4 col-xs-offest-2>
                                            <form method='POST' action="{{route('images.delete',$portfolioImage->id)}}">
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
