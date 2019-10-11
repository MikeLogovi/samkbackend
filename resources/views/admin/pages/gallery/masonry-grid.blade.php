@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="{{asset('assets/admin/js/pages/gallery.js')}}"></script>
@stop

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Gallery</h3>
           
        </div>
        <div class="card">
            <div class="card-header">
                <h6>Images</h6>
            </div>
            <div class="card-body">
                <div class="my-gallery image-gallery" itemscope>
                    <div class="my-gallery-container">
                    @php
                       $i = 1
                    @endphp
                        @foreach($images as $image)
                        <div class="item" data-order="{{$i++}}">
                            <figure itemprop="associatedMedia" itemscope>
                                <a href="{{asset('/storage/'.$image->source)}}"
                                   itemprop="contentUrl" data-size="{{$image->dataSize()}}">
                                    <img src="{{asset('/storage/'.$image->source)}}" itemprop="thumbnail"
                                         class="img-fluid" alt="Image description"/>
                                </a>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                    <!-- Background of PhotoSwipe.
                         It's a separate element, as animating opacity is faster than rgba(). -->
                    <div class="pswp__bg"></div>

                    <!-- Slides wrapper with overflow:hidden. -->
                    <div class="pswp__scroll-wrap">

                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>

                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                        <div class="pswp__ui pswp__ui--hidden">

                            <div class="pswp__top-bar">

                                <!--  Controls are self-explanatory. Order can be changed. -->

                                <div class="pswp__counter"></div>

                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                                <button class="pswp__button pswp__button--share" title="Share"></button>

                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                        <div class="pswp__preloader__cut">
                                            <div class="pswp__preloader__donut"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div>
                            </div>

                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                            </button>

                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                            </button>

                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h6>Videos</h6>
            </div>
            <div class="card-body">
                <div class="my-gallery youtube-video-gallery">
                    <div class="my-gallery-container">
                        @php
                        $j=1
                        @endphp
                       @foreach($videos as $video)
                        <div class="item embed-responsive embed-responsive-16by9" data-order="{{$j++}}">
                        <iframe width="250" height="150" src="{{$video->source}}" frameborder="0" autoplay="false" allow="accelerometer;encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop