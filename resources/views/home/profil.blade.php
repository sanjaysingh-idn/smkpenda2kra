@extends('home.layouts.app')

@section('content')
	<section id="about">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<span data-aos="fade-right">
						<h2 class="text-uppercase text-center mb-3">{{ $profil->title }}</h2>
					</span>
				</div>
				<div class="col-md-3">
					@foreach ($profils as $item)
						<a href="{{ url('profil/' . $item->slug) }}"
							class="badge bg-egyptian-blue text-decoration-none p-3 rounded-3 mb-2 w-100 text-start {{ request()->is('profil/' . $item->slug) ? 'text-white' : 'text-citrine' }}">{{ $item->title }}</a><br>
					@endforeach
				</div>
				<div class="col-md-9 bg-white p-3">

					@if (url()->current() == url('profil/fasilitas'))
						<span data-aos="fade-down">
							<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-inner">
									@php
										$arrayName = ['4.png', '5.png', '6.png', '7.png', '8.png', '9.png'];
									@endphp
									@foreach ($arrayName as $key => $imageName)
										<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
											<img src="{{ asset('storage/fas/' . $imageName) }}" class="w-100" alt="Slide Image">
										</div>
									@endforeach
								</div>
								<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleCaptions" role a=button" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</a>
							</div>
							<br>
							{!! $profil->desc !!}
						</span>
					@elseif (url()->current() == url('profil/identitas-sekolah'))
						<img src="{{ asset('temp_back/assets/img/identitas.jpeg') }}" class="img-thumbnail" alt="image desc">
						<br>
						{!! $profil->desc !!}
					@else
						<span data-aos="fade-down">
							{!! $profil->desc !!}
						</span>
					@endif

				</div>
			</div>
		</div>
	</section>
@endsection
