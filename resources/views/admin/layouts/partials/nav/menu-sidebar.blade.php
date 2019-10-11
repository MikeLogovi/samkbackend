<ul class="side-nav metismenu" id="menu">
    @foreach(config('menu.sidebar') as $menu)
      @if(in_array(Auth::user()->role,$menu['roles']))
        <li class="{{set_active($menu['active'],'active')}}">
            @if(!$menu['title']=='Profile')
            <a href="{{url($menu['link'])}}"><i class="{{$menu['icon']}}"></i> {{$menu['title']}} @if(isset($menu['children']))<span class="icon-fa arrow icon-fa-fw"></span> @endif</a>
            @else
            <a href="{{url($menu['link'])}}/{{Auth::user()->id}}"><i class="{{$menu['icon']}}"></i> {{$menu['title']}} @if(isset($menu['children']))<span class="icon-fa arrow icon-fa-fw"></span> @endif</a>
            @endif
            @if(isset($menu['children']))
                <ul aria-expanded="true" class="collapse">
                    @foreach($menu['children'] as $child)
                        <li class="{{set_active($child['active'],'active')}}">
                            <a href="{{url($child['link'])}}">{{$child['title']}}@if(isset($child['children']))<span class="icon-fa arrow icon-fa-fw"></span> @endif</a>
                            @if(isset($child['children']))
                                <ul aria-expanded="true" class="collapse submenu">
                                    @foreach($child['children'] as $subchild)
                                        <li class="{{set_active($subchild['active'])}}"><a href="{{url($subchild['link'])}}">{{$subchild['title']}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
        @endif
    @endforeach
</ul>