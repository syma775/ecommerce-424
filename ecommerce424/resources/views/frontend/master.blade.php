<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        @include('frontend.includes.style')
    </head>
    <body>
        <!-- Navigation-->
        @include('frontend.includes.header')
        <!-- Header-->
        @yield('content')
        <!-- Footer-->
       @include('frontend.includes.footer')
        <!-- Bootstrap core JS-->
    @include('frontend.includes.script')
    </body>
</html>
