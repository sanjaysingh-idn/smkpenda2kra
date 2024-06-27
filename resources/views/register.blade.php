<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style customizer-hide" dir="ltr"
	data-theme="theme-default" data-assets-path="{{ asset('temp_back') }}/assets/"
	data-template="vertical-menu-template-free">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport"
			content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

		<title>SMK Penda 2 Karanganyar - Register</title>

		<meta name="description" content="" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('template/assets/img/favicon') }}/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('template/assets/img/favicon') }}/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('template/assets/img/favicon') }}/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/assets/img/favicon') }}/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('template/assets/img/favicon') }}/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('template/assets/img/favicon') }}/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('template/assets/img/favicon') }}/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152"
			href="{{ asset('template/assets/img/favicon') }}/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180"
			href="{{ asset('template/assets/img/favicon') }}/apple-icon-180x180.png">
		<link rel="icon" type="image/x-icon" href="{{ asset('temp_front') }}/img/logo-smkpenda2kra.png">
		<link rel="manifest" href="{{ asset('template/assets/img/favicon') }}/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="{{ asset('template/assets/img/favicon') }}/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
			rel="stylesheet" />

		<!-- Icons. Uncomment required icon fonts -->
		<link rel="stylesheet" href="{{ asset('temp_back') }}/assets/vendor/fonts/boxicons.css" />

		<!-- Core CSS -->
		<link rel="stylesheet" href="{{ asset('temp_back') }}/assets/vendor/css/core.css"
			class="template-customizer-core-css" />
		<link rel="stylesheet" href="{{ asset('temp_back') }}/assets/vendor/css/theme-default.css"
			class="template-customizer-theme-css" />
		<link rel="stylesheet" href="{{ asset('temp_back') }}/assets/css/demo.css" />

		<!-- Vendors CSS -->
		<link rel="stylesheet" href="{{ asset('temp_back') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

		<!-- Page CSS -->
		<!-- Page -->
		<link rel="stylesheet" href="{{ asset('temp_back') }}/assets/vendor/css/pages/page-auth.css" />
		<!-- Helpers -->
		<script src="{{ asset('temp_back') }}/assets/vendor/js/helpers.js"></script>

		<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
		<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
		<script src="{{ asset('temp_back') }}/assets/js/config.js"></script>
	</head>

	<body>
		<!-- Content -->

		@if (session()->has('loginError'))
			<div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-50 translate-middle-x show"
				role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
				<div class="toast-header">
					<i class='bx bx-error-circle me-2'></i>
					<div class="me-auto fw-semibold">{{ session('loginError') }}</div>
					<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		@endif

		<div class="container-xxl">
			<div class="authentication-wrapper authentication-basic container-p-y">
				<div class="authentication-inner">
					<!-- Register -->
					<div class="card">
						<div class="card-body">
							<!-- Logo -->
							<div class="text-center">
								<div class="logo">
									<img src="{{ asset('temp_front') }}/img/logo-smkpenda2kra.png" alt="Logo Kemendagri" width="50">
									<div class="line border-bottom border-3 border-primary rounded-pill my-2"></div>
								</div>
								<div class="fs-4 fw-bold my-3">
									Formulir Pendafataran Calon Siswa SMK Penda 2 Karanganyar
								</div>
							</div>
							<div class="mb-3">
								<small>Silahkan isi form dibawah ini</small>
							</div>
							<!-- /Logo -->

							<form method="POST" action="{{ route('register') }}">
								@csrf
								<div class="mb-3">
									<label for="name" class="form-label">Nama</label>
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
										name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="text" placeholder="Email" id="email" name="email"
										class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus required>
									@error('email')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="mb-3 form-password-toggle">
									<div class="d-flex justify-content-between">
										<label class="form-label" for="password">Password</label>
									</div>
									<div class="input-group input-group-merge">
										<input type="password" id="password" class="form-control" name="password"
											placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
											aria-describedby="password" required />
										<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
									</div>
								</div>
								<div class="mb-3 form-password-toggle">
									<div class="d-flex justify-content-between">
										<label class="form-label" for="password_confirmation">Konfirmasi Password</label>
									</div>
									<div class="input-group input-group-merge">
										<input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
											placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
											aria-describedby="password" required />
										<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
									</div>
								</div>
								<div class="mb-3">
									<button class="btn btn-primary w-100" type="submit"><i class='bx bx-log-in'></i> Daftar</button>
								</div>
							</form>

							<div class="my-3">
								<small>Sudah punya akun ? silahkan login <a href="{{ route('login') }}">disini</a></small>
							</div>
							<div class="my-3">
								<small><a href="/">Kembali ke home</a></small>
							</div>

						</div>
					</div>
					<!-- /Register -->
				</div>
			</div>
		</div>

		<!-- / Content -->

		<!-- Core JS -->
		<!-- build:js assets/vendor/js/core.js -->
		<script src="{{ asset('temp_back') }}/assets/vendor/libs/jquery/jquery.js"></script>
		<script src="{{ asset('temp_back') }}/assets/vendor/libs/popper/popper.js"></script>
		<script src="{{ asset('temp_back') }}/assets/vendor/js/bootstrap.js"></script>
		<script src="{{ asset('temp_back') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

		<script src="{{ asset('temp_back') }}/assets/vendor/js/menu.js"></script>
		<!-- endbuild -->

		<!-- Vendors JS -->

		<!-- Main JS -->
		<script src="{{ asset('temp_back') }}/assets/js/main.js"></script>

		<!-- Page JS -->
		<script src="{{ asset('temp_back') }}/assets/js/ui-toasts.js"></script>

		<!-- Place this tag in your head or just before your close body tag. -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>
	</body>

</html>
