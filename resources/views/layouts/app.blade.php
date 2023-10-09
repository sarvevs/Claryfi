<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])

</head>
<body>
    <div id="app">

{{--        <CalculateComponent></CalculateComponent>--}}
{{--        <calculate-component></calculate-component>--}}
{{--        <ResultComponent--}}
{{--            v-if="showResult"--}}
{{--            :selected-company="selectedCompany"--}}
{{--            :shipping-cost="shippingCost"--}}
{{--        ></ResultComponent>--}}

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#calculate').submit(function (e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    method: 'POST',
                    datatype: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        company: $('#company').val(),
                        weight: $('#weight').val(),
                    },
                    url: "{{ route('calculate') }}",
                    success: function (response) {
                        console.log(response);
                        if(response.selectedCompany){
                            $('#message').html('Вы выбрали компанию: ' + response.selectedCompany + '<br>Стоимость доставки: ' + response.shippingCost  )
                        }
                        // if(data.success === 'success'){
                        //     $('#message').html(data.shippingCost)
                        // }
                    },
                })
            })
        });
    </script>
{{--<script>--}}
{{--    $.ajax({--}}
{{--        type: 'POST',--}}
{{--        dataType: "json",--}}
{{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
{{--        data: {--}}
{{--            company: $('#company').val(),--}}
{{--            weight: $('#weight').val(),--}}
{{--        },--}}
{{--        url: "{{ route('calculate') }}",--}}
{{--        success: function (response) {--}}
{{--            console.log(response);--}}
{{--            if (response.selectedCompany) {--}}
{{--                $('#message').html('Вы выбрали компанию: ' + response.selectedCompany + '<br>Стоимость доставки: ' + response.shippingCost  );--}}
{{--            }--}}
{{--        },--}}
{{--        error: function (xhr, status, error) {--}}
{{--            console.error(error);--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
