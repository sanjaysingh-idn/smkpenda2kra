@extends('home.layouts.app')

@section('content')
	<section id="about">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-3">

				</div>
				<div class="col-md-9">
					<span data-aos="fade-right">
						<h2 class="text-uppercase text-center mb-3">
							{{ $title }}
						</h2>
					</span>
				</div>
				<div class="col-md-3">
					<a href="{{ url('akademik/data-guru') }}"
						class="badge bg-egyptian-blue text-decoration-none p-3 rounded-3 mb-2 w-100 text-start {{ request()->is('akademik/data-guru') ? 'text-citrine' : 'text-white' }}">Data
						Guru</a><br>
					<a href="{{ url('akademik/data-siswa') }}"
						class="badge bg-egyptian-blue text-decoration-none p-3 rounded-3 mb-2 w-100 text-start {{ request()->is('akademik/data-siswa') ? 'text-citrine' : 'text-white' }}">Data
						Siswa</a><br>
				</div>
				<div class="col-md-9">
					<span data-aos="fade-down">
						<div class="row">
							<div class="card">
								<div class="card-header">
									<div class="img-thumbnail mb-3">
										<img src="{{ asset('storage/' . $siswa->grafik) }}" alt="Grafik Siswa" class="img-fluid">
									</div>
								</div>
								<div class="card-body">
									{!! $siswa->content !!}
								</div>
							</div>
						</div>
					</span>
				</div>
			</div>
		</div>
	</section>
@endsection
