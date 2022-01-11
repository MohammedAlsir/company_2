<!DOCTYPE html>
<html lang="en" dir="rtl">

@include('layout.head')
@livewireStyles

<body>

 @include('layout.header')

    @yield('content')

@include('layout.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('layout.js')
@livewireScripts

</body>

</html>
