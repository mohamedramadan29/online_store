<!doctype html>
<html lang="{{Config::get('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('website.layouts.head')
</head>
<body dir="{{Config::get('app.locale') == 'ar' ? 'rtl' : 'ltr'}}">
@include('website.layouts.navbar')

@yield('contetn')

@include('website.layouts.footer_scripts')
@include('website.layouts.footer')
</body>
</html>
