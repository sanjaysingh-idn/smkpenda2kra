@extends('home.layouts.app')

@section('content')
	<section id="about">
		<div class="container">
			<div class="row mt-4">
				<div class="col-md-9 mb-5 bg-white p-5">
					<!-- Back Button -->
					<div class="mb-4">
						<a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
					</div>
					<span data-aos="fade-down">
						<div class="head">
							<h3>{{ $berita->judul }}</h3>
							<small>Penulis : {{ $berita->author }}</small><br>
							<small>{{ date('d F Y', strtotime($berita->published_at)) }}</small>
						</div>
						<hr>
						<div class="konten">
							<picture>
								<source srcset="sourceset" type="image">
								<img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid" alt="image desc">
							</picture>
							<div class="mt-4 text-black">
								{!! $berita->content !!}
							</div>
						</div>
					</span>

				</div>
				<div class="col-md-3">
					<span data-aos="fade-down">
						<div class="row">
							@foreach ($brosur as $item)
								<div class="col-12 mb-3">
									<img src="{{ asset('storage/' . $item->foto) }}" class="rounded-start img-fluid" alt="...">
									<a href="{{ asset('storage/' . $item->foto) }}" download="{{ $item->nama_brosur }}"
										class="btn btn-primary mt-3">
										Download
									</a>
								</div>
							@endforeach
						</div>
					</span>
				</div>
			</div>
		</div>
	</section>
@endsection
