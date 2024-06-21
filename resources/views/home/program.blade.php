@extends('home.layouts.app')

@section('content')
	<section id="about">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3">

				</div>
				<div class="col-lg-9 ">
					<span data-aos="fade-right">
						<h2 class="text-uppercase text-center mb-3">{{ $program->nama_program }}</h2>
					</span>
				</div>
				<div class="col-lg-3">
					@foreach ($programs as $item)
						<a href="{{ url('program-keahlian/' . $item->slug) }}"
							class="badge bg-egyptian-blue text-decoration-none p-3 rounded-3 mb-2 w-100 text-start {{ request()->is('program-keahlian/' . $item->slug) ? 'text-citrine' : 'text-white' }}">{{ $item->nama_program }}</a><br>
					@endforeach
				</div>
				<div class="col-lg-9 bg-white p-3">
					<span data-aos="fade-down">

						<div class="text-center mb-4">
							<img src="{{ asset('storage/' . $program->foto_utama) }}" style="width: 450px;" class="img-thumbnail"
								alt="image desc">
						</div>

						{!! $program->desc !!}
					</span>
				</div>
			</div>
		</div>
	</section>
@endsection
