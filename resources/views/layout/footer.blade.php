  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <h3>{{Helper::GeneralSiteSettings('site_name')}}</h3>
            <p>يمكنك التواصل معنا عبر قروباتنا في مواقع التواصل الاجتماعي</p>
            <div class="social-links mt-3">

                @if (Helper::GeneralSiteSettings('twitter'))
                    <a href="https://{{Helper::GeneralSiteSettings('twitter')}}" class="twitter"><i class="bx bxl-twitter"></i></a>
                @endif

                @if (Helper::GeneralSiteSettings('facebook'))
                   <a href="https://{{Helper::GeneralSiteSettings('facebook')}}" class="facebook"><i class="bx bxl-facebook"></i></a>
                @endif

                @if (Helper::GeneralSiteSettings('linkdin'))
                    <a href="https://{{Helper::GeneralSiteSettings('linkdin')}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                @endif

                @if (Helper::GeneralSiteSettings('whatsapp'))
                    <a href="https://{{Helper::GeneralSiteSettings('whatsapp')}}" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
                @endif

            </div>
          </div>

            <div class="col-lg-6 col-md-6 footer-info">
                <div>
                    <h3 style="display: inline-block">البريد الالكتروني</h3>
                    <p style="display: inline-block">{{Helper::GeneralSiteSettings('email')}}</p>
                </div>
                <div>
                    <h3 style="display: inline-block">رقم الهاتف</h3>
                    <p style="display: inline-block">{{Helper::GeneralSiteSettings('phone')}}</p>
                </div>
            </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
          كل الحقوق محفوظة
        <strong><span> سوداكود </span></strong>
        &copy; Copyright

      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->
