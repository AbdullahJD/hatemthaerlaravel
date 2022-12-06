<!doctype html>
<html lang="en">

@include('landing.head')

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

@include('landing.header')

@yield('content')

@include('landing.footer')

@include('landing.modal')

@include('landing.scripts')
</body>

</html>
