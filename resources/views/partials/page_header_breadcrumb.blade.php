
<div class="page-header">
        <h3 class="page-title {{$titleClass??''}}" style="color:{{$titleColor?? ''}}">{{$pageTitle ?? ''}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{route($routeUrl)}}" >{{$routeParentName}}</a></li>
            <li class="breadcrumb-item active">{{$routeName}}</li>
        </ol>
</div>
