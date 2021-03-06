<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Ticket Booking App') - Laravel 晚会订票系统</title>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>

    <script src="/js/app.js"></script>
  </body>
</html>