<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
        <link rel="stylesheet" href="{{ asset('css/item-card.css') }}">
        <link rel="stylesheet" href="{{ asset('css/latest-view.css') }}">
        <link rel="stylesheet" href="{{ asset('css/overview.css') }}">
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

        <!-- Font awesome -->
       <script src="https://kit.fontawesome.com/889b7cea00.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="{{URL::asset('js/index.js')}}"></script>

    </head>
    <body>
    @include('layouts.navigation')
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    </body>
</html>
