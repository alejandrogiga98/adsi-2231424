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
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            }
    </style>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6 sticky top-0">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @guest
                        <div class="dropdown inline-block relative ml-4">
                            <button class="bg-blue-200 text-blue-900 font-semibold py-2 px-4 rounded inline-flex items-center">
                            <span class="mr-1">@lang('general.title-lang')</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> 
                            </svg>
                            </button>
                            <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                                <li class="">
                                    <a class="rounded-t bg-blue-900 text-white hover:bg-blue-600 py-2 px-4 flex flex-row gap-2 items-center whitespace-no-wrap" href="{{ url('locale/en') }}">
                                        <img class="w-6 h-6" src="{{ asset('images/us.svg') }}">
                                        @lang('general.text-english')
                                    </a>
                                </li>
                                <li class="">
                                    <a class="rounded-b bg-blue-900 text-white hover:bg-blue-600 py-2 px-4 flex flex-row gap-2 items-centers whitespace-no-wrap" href="{{ url('locale/es') }}">
                                        <img class="w-6 h-6" src="{{ asset('images/co.svg') }}">
                                        @lang('general.text-spanish')
                                    </a>
                                </li>
                            </ul>
                    </div>
                @endguest
                </div>

                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('general.nav-login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('general.nav-register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('general.nav-logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
    <script src="//cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var statusCheck     = false
        // Actions
        $('body').on('click', '.chk', function () {
            if (!$(this).prop('checked')) {
                $(this).closest('tr').css('background-color', '#fff')
            } else {
                $(this).closest('tr').css('background-color', '#25397211')
            }
        })
        $('body').on('click', '#checkbox-all-search', function () {
            if (!statusCheck) {
                $('.chk').prop('checked', true)
                $('.chk').closest('tr').css('background-color', '#25397211')
            } else {
                $('.chk').prop('checked', false)
                $('.chk').closest('tr').css('background-color', '#fff')
            }
            statusCheck = !statusCheck
        })
        // - - -
        $('.btn-upload').click(function() {
            $('#photo').click();
        });
        $('#photo').change(function(event) {
            let reader = new FileReader()
            reader.onload = function(event) {
                $('#preview').attr('src', event.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        })
        // - - -
        @if (session('message'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('message') }}',
                showConfirmButton: false,
                timer: 3500
            })
        @endif
        // - - - 
        $('body').on('click', '.btn-delete', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#253972',
                cancelButtonColor: '#8F2923',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent().submit()
                    }
                })
            })
    </script>
</body>
</html>
