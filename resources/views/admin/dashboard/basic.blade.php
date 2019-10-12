@extends('admin.layouts.layout-basic')

@section('content')
    <div class="main-content" id="dashboardPage">
        <div class="row">
        @foreach($bigData as $data)
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox" href="#">
                    <i class="{{$data['icon']}}" style="color:{{$data['color']}}"></i>
                    <span class="title">
                      {{$data['value']}}
                    </span>
                    <span class="desc">
                    {{$data['title']}}
                    </span>
                </a>
            </div>
        @endforeach
    </div>
       
  </div>    
@stop
