@extends('layout.main')
@section('title','مراجعة طلب')
@section('orders','active')
@section('content')

 <main id="main">


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">

          <div class="col-lg-12 mb-5">
            <form action="{{route('orders')}}" method="post" role="form" class="php-email-form">
                @csrf
              <div class="row">
                <div class="col-md-3 form-group">
                </div>

                <div class="col-md-6 form-group">
                    @if (session('error'))
                        <span class="mb-2" style="color: red">{{session('error')}}</span>
                    @endif
                  <input type="text" name="order_id" class="form-control" placeholder="ادخل رقم الطلب" required>
                </div>
                <div class="col-md-3 form-group">
                </div>
              </div>

              <div class="my-3">
                {{-- <div class="loading">جاري البحث</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div> --}}
              </div>
              <div class="text-center"><button type="submit">بحث</button></div>
            </form>
          </div>

        </div>
        <div class="row">
            @if (Helper::GeneralSiteSettings('location'))

                <div class="col-lg-6">
                    <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>موقعنا</h3>
                    <p>{{Helper::GeneralSiteSettings('location')}}</p>
                    </div>
                </div>
            @endif


            @if (Helper::GeneralSiteSettings('email'))

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>البريد الالكتروني</h3>
                    <p>{{Helper::GeneralSiteSettings('email')}}</p>
                    </div>
                </div>
            @endif


            @if (Helper::GeneralSiteSettings('phone'))

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>اتصل بنا</h3>
                    <p>{{Helper::GeneralSiteSettings('phone')}}</p>
                    </div>
                </div>
            @endif


        </div>



      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection


