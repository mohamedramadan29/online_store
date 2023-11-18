<title> @yield('title') </title>
@if(Config::get('app.locale') == 'ar')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
 @else
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 @endif
<link rel="stylesheet" href="{{asset('assets/dist/css/owl/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dist/css/owl/owl.theme.default.min.css')}}">
<link rel="stylesheet" href={{asset('assets/plugins/fontawesome-free/css/all.min.css')}}>
@yield('css')
