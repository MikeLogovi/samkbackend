<!DOCTYPE html>
<html>
<head>
    <title>SAM K TRAVEL & TOUR  - Administration</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <script src="{{asset('/assets/admin/js/core/pace.js')}}"></script>
    <link href="{{ mix('/assets/admin/css/laraspace.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/admin/css/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.layouts.partials.favicons')
    @yield('styles')
</head>
<body class="layout-default skin-default">
    @include('admin.layouts.partials.laraspace-notifs')

    <div id="app" class="site-wrapper">
        @include('admin.layouts.partials.header')
        <div class="mobile-menu-overlay"></div>
        @include('admin.layouts.partials.sidebar',['type' => 'default'])

        @yield('content')

       
        @if(config('laraspace.skintools'))
            @include('admin.layouts.partials.skintools')
        @endif
    </div>

    <script src="{{mix('/assets/admin/js/core/plugins.js')}}"></script>
    <script src="{{asset('/assets/admin/js/demo/skintools.js')}}"></script>
    <script src="{{mix('/assets/admin/js/core/app.js')}}"></script>
    @yield('scripts')
</body>
</html>
