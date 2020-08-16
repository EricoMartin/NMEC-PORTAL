<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NMEC') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}">
    @FilemanagerScript
</head>
<body>
    <div id="app"> 
        <nav class="navbar navbar-dark navbar-expand-md navbar-inverse bg-primary shadow-sm">
            <div class="container">
                <h1><a class="navbar-brand" href="{{ url('/') }}" style="padding-top: 0.60rem;padding-bottom: 0;">
                    <img src="{{asset('/storage/images/output.png')}}" alt="nmec logo" style="width:70px; height:70px; margin-top: 3px;"> {{ config(' app.name', 'NMEC') }}
                </a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            @if(Auth::user())
                            <a class="nav-link" href="/home"><img src="{{asset('/storage/images/house.png')}}" alt="nmec logo" style="width:20px; height:20px; "> Home<span class="sr-only">(current)</span></a>
                          </li>
                          
                            <li class="nav-item active">
                              <a class="nav-link" href="/inbox"><img src="{{asset('/storage/images/folder-9.png')}}" alt="nmec logo" style="width:20px; height:20px; "> Create Message<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                              <a class="nav-link" href="/{{Auth::user()->id}}/inbox"><img src="{{asset('/storage/images/folder-8.png')}}" alt="nmec logo" style="width:20px; height:20px; "> All Messages<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                              <a class="nav-link" href="<?php echo e(url('/staff/'.Auth::user()->id.'/update')); ?>"><img src="{{asset('/storage/images/id-card-5.png')}}" alt="nmec logo" style="width:20px; height:20px; "> Update Data<span class="sr-only">(current)</span></a>
                            </li>
                            @if(Auth::user()->roles()->pluck('name')->contains('admin'))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('admin.staff_list') }}"><img src="{{asset('/storage/images/list-1.png')}}" alt="nmec logo" style="width:20px; height:20px; ">&nbsp;Staff List<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link" href="{{ route('admin.user_list') }}"><img src="{{asset('/storage/images/notepad.png')}}" alt="nmec logo" style="width:20px; height:20px; ">&nbsp;User List<span class="sr-only">(current)</span></a>
                              </li>
                              {{-- <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/admin') }}">Admin Dashboard<span class="sr-only">(current)</span></a>
                              </li> --}}
                              @endif
                            @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                </li>
                            @endif
                        @else
                        <li class="nav-item active">
                            <a class="nav-link" href="#" aria-expanded="false" v-pre>
                               Welcome {{ Auth::user()->name }} 
                            </a>

                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor',{
            filebrowserBrowseUrl: 'filemanager.ckBrowseUrl',
            filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
            filebrowserUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images'

        });
    </script>
</body>
</html>
