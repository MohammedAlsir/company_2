<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- BEGIN HEAD -->

@include('layout-dashboard.head')
<body class="page-md login">
	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler">
	</div>
	<!-- END SIDEBAR TOGGLER BUTTON -->
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="{{route('admin')}}">
			<img src="{{asset('uploads/logos/'.Helper::GeneralSiteSettings('photo'))}}" alt="" />
		</a>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
			<h3 class="form-title">تسجيل الدخول</h3>

			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
			</div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">البريد الالكتروني </label>

                <input id="email" type="email" class="form-control form-control-solid placeholder-no-fix @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                 @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
                <input id="password" type="password"
                                class="form-control form-control-solid placeholder-no-fix @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-block  btn-success uppercase">دخول</button>

			</div>
		</form>
		<!-- END LOGIN FORM -->

	</div>
	<div class="copyright">
		2022 © كل الحقوق محفوظة .
	</div>

</body>
@include('layout-dashboard.js')


</body>
<!-- END BODY -->

</html>
