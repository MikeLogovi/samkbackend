@extends('admin.layouts.layout-basic')
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Portfolio's categories</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 mb-4">
                    <a class="btn btn-success" href="{{ route('portfolio_categories.create')}}"><i class="icon-fa icon-fa-plus"></i>CREATE NEW CATEGORY</a><br/><br/>

                        <div class="row">
                            @forelse($portfolioCategories as $portfolioCategory)
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h3> {{$portfolioCategory->name}}</h3>
                                                <div class="actions">
                                                    <a href="{{route('portfolio_categories.edit',$portfolioCategory)}}" class="btn btn-warning btn-sm"> <i class="icon-fa icon-fa-pencil"></i> Update</a>
                                                    <form method='POST' action="{{route('portfolio_categories.delete',$portfolioCategory->id)}}" style="display:inline">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button type='submit' class=" btn-sm btn btn-danger"><i class="icon-fa icon-fa-trash"></i> Delete</button>
                                                    </form>                                           
                                               
                                                </div>
                                            </div>
                                            <div class="card-body">
                                            <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr> 
                                <th>Picture</th>
                                <th>Title</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             @forelse($portfolioCategory->portfolio_images as $portfolio_image)
                             <tr>
                                 <td>
                                   
                                       <img src="{{asset('/storage/'.$portfolio_image->source)}}" width="150" height="100">
                                   
                                 </td>
                                 <td>{{$portfolio_image->title}}</td>
                                 <td>{{$portfolio_image->updated_at}}</td>
                                 <td>
                                     <div class=row>
                                         <div class=col-xs-4>
                                            <a class="btn btn-warning" href="{{ route('portfolio_images.edit',[$portfolioCategory,$portfolio_image])}}"><i class="icon-fa icon-fa-pencil"></i>UPDATE</a>
                                         </div><br><br>
                                         <div class=col-xs-4 col-xs-offest-2>
                                            <form style="display:inline" method='POST' action="{{route('images.delete',$portfolio_image->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                <button type='submit' class="btn btn-danger"><i class="icon-fa icon-fa-trash"></i>DELETE</button>
                                            </form>                                           
                                         </div>
                                     </div>  
                                 </td>
                             </tr>
                             @empty
                                 @include('partials/unavailable',['message'=>'NO IMAGE CREATED'])
                             @endforelse
                            </tbody>
                        </table>
                        </div>
                                            </div>
                                        </div>
                                    </div>
                            @empty
                                  @include('partials/unavailable',['message'=>'NO CATEGORY CREATED'])
                            @endforelse
                            
                        </div>







                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
