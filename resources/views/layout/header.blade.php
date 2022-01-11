 <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        {{-- <h1><a href="index.html">Eterna</a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{route('home')}}"><img src="{{asset('uploads/logos/'.Helper::GeneralSiteSettings('photo'))}}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul style='font-family: "IBM Plex Sans Arabic", sans-serif;'>
          <li><a class="@yield('home')" href="{{route('home')}}"> الرئيسية</a></li>
          <li><a class="@yield('services')" href="{{route('services')}}">طلب خدمة </a></li>
          <li><a class="@yield('buy')" href="{{route('cart.show')}}">السلة +<span>@livewire('cart-counter')</span> </a></li>
          <li><a class="@yield('orders')" href="{{route('orders')}}">مراجعة طلب</a></li>
          {{-- <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="team.html">Team</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
