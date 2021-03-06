<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel7_Project') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>    
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/886350cba8.js" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="{{route('index')}}" class="nav-link">首頁</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('product.index')}}" class="nav-link">商品頁</a>
                            </li>


                            <li class="nav-item">
                                <a href="{{route('product.create')}}" class="nav-link">建立商品</a>
                            </li>


                            <li class="nav-item">
                                <a href="{{route('product.search')}}" class="nav-link">搜尋商品</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('contactus')}}" class="nav-link">聯絡我們</a>
                            </li>                    

                            {{-- <li class="nav-item">
                                <a href="{{route('dashboard')}}" class="nav-link">商品討論區</a>
                            </li>   --}}

                            {{-- <li class="nav-item">
                                <a href="{{route('discuss.create')}}" class="nav-link">新增商品文章</a>
                            </li>   --}}
                        </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                        <a href="{{ route('cart.show')}}" class="nav-link">
                            <span class="fas fa-shopping-cart">
                               我的購物車( {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})
                            </span>
                        </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('登入') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('註冊') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('order.index') }}" class="dropdown-item">購買記錄<i class="fas fa-grip-horizontal ml-2"></i></a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('登出') }}
                                        <i class="fas fa-sign-out-alt ml-2"></i>
                                        </a>
                                        

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
    @include('sweetalert::alert')

    @yield('script')

</body>
</html>
