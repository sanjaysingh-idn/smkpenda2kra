<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description"
			content="SMK Penda 2 adalah salah satu satuan pendidikan dengan jenjang SMK di Popongan, Kec. Karanganyar, Kab. Karanganyar, Jawa Tengah">
		<meta name="keyword" content="smk penda 2 karanganyar, smk penda 2, smk penda 2 karanganyar, jawa tengah">

		<link rel="icon" type="image/x-icon" href="{{ asset('temp_front') }}/img/logo-smkpenda2kra.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('temp_front') }}/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('temp_front') }}/css/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ asset('temp_front') }}/css/owl.theme.default.min.css">
		<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="{{ asset('temp_front') }}/css/style.css">
		<link rel="stylesheet" href="{{ asset('temp_front') }}/css/custom-color.css">

		{{-- Icon --}}
		<link rel="stylesheet" href="{{ asset('temp_back') }}/assets/vendor/fonts/boxicons.css" />

		{{-- Animation Scroll --}}
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

		{{-- Font --}}

		<style>
			body {
				background-image: url({{ asset('temp_front/img/bg.jpg') }})
			}

			body,
			p {
				font-size: 20px;
				/* Adjust the font size as needed */
			}
		</style>

		<title>{{ $title }}</title>
	</head>

	<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

		@include('home.layouts.navbar')

		@if (Request::is('/'))
			@include('home.layouts.jumbotron')
		@else
			@include('home.layouts.breadcrumb')
		@endif

		@yield('content')
		@include('home.layouts.footer')

		<script src="{{ asset('temp_front') }}/js/jquery.min.js"></script>
		<script src="{{ asset('temp_front') }}/js/bootstrap.bundle.min.js"></script>
		<script src="{{ asset('temp_front') }}/js/owl.carousel.min.js"></script>
		<script src="{{ asset('temp_front') }}/js/app.js"></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init();
		</script>
		<script>
			// Get all elements with class "read-more"
			const readMoreElements = document.querySelectorAll('.read-more');

			// Loop through each "Read More" element and add click event listener
			readMoreElements.forEach(element => {
				element.addEventListener('click', function() {
					// Get the slug from the data attribute
					const slug = this.getAttribute('data-slug');

					// Redirect to the URL based on the slug
					window.location.href = '{{ url('program-keahlian') }}/' + slug;
				});

				// Style the "Read More" text to look like a link
				element.style.cursor = 'pointer';
				element.style.color = 'blue'; // Change color as desired
			});
		</script>
	</body>

</html>
