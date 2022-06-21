<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-neutral-600 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    {{-- Inicio prueba --}}

                   {{--  <button class="text-black font-bold bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center hover:scale-110 hover:bg-gray-200 transition duration-300" type="button">
                        <h4 class="mr-3">@lang('general.nav-en')</h4>
                        <img src="{{url('/images/en.png')}}" alt="Image"/>
                    </button>
                    <button class="text-black font-bold bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center hover:scale-110 hover:bg-gray-200 transition duration-300" type="button">
                        <h4 class="mr-3">@lang('general.nav-es')</h4>
                        <img src="{{url('/images/es.png')}}" alt="Image"/>
                    </button> --}}
                  {{--   <div class="mx-4 bg-red-800">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                @endif
                            @endforeach
                            </div>
                        </li>
                    </div> --}}

                    <button type="button" class="text-black font-bold bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center hover:scale-110 hover:bg-gray-200 transition duration-300" type="button"> Languages
                    </button>
                    <div class="hidden origin-top-right absolute w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" id="divLanguage">
                        <div class="py-1 px-2" role="none">
                            <a href="{{ url('locale/en') }}" class="text-gray-700 px-4 py-2 text-sm hover:bg-gray-100 hover:text-blue-700 hover:scale-110 flex">
                                <img src="{{url('/images/en.png')}}" alt="Image"/> 
                                <p class="ml-2">English</p> 
                            </a>
                            <a href="{{ url('locale/es') }}" class="text-gray-700 px-4 py-2 text-sm hover:bg-gray-100 hover:text-blue-700 hover:scale-110 flex">
                                <img src="{{url('/images/es.png')}}" alt="Image"/>
                                <p class="ml-2">Spanish</p>
                            </a>
                            {{-- <h4 class="mr-3">@lang('general.nav-es')</h4>
                            <img src="{{url('/images/es.png')}}" alt="Image"/> --}}
                        </div>
                    </div> 

                   
                    {{-- Fin prueba --}}
                    @guest
                        {{-- <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                        <a class="no-underline hover:underline" href="{{ route('login') }}">@lang('general.nav-login')</a>
                        @if (Route::has('register'))
                            {{-- <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                            <a class="no-underline hover:underline" href="{{ route('register') }}">@lang('general.nav-register')</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>
 
                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
 
        @yield('content')
    </div>
</body>
<script>
    /* const burgerLogo = document.querySelector('path.burger');
    const closeLogo = document.querySelector('path.close'); */
    const divLanguage = document.querySelector('div#divLanguage');
    /* const click_menu = document.querySelector('a.flex'); */
    const btn = document.querySelector('button');
    
    btn.onclick = function(){
        console.log('prueba');
        /* burgerLogo.classList.toggle('hidden');
        closeLogo.classList.toggle('hidden'); */
        divLanguage.classList.toggle('hidden')
    }
  
    /* btn.addEventListener()

    btn.classList.toggle('on');
    imageBox.classList.add('woman');
    imageBox.classList.remove('man');
    
    btn.onclick = function(){
        console.log('prueba')
    }
    */

</script>
</html>