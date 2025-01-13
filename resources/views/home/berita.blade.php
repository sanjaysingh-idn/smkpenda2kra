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
			</div>
			<div class="row mt-4">
				<div class="col-md-9">
					<span data-aos="fade-down">
						<div class="row">
							@foreach ($berita as $item)
								<div class="col-12">
									<a href="{{ route('informasi.berita.detail', ['slug' => $item->slug]) }}" class="text-decoration-none">
										<div class="card mb-5 border-0">
											<div class="row g-0">
												<div class="col-md-4">
													<img src="{{ asset('storage/' . $item->foto) }}" class="rounded-start img-fluid h-100"
														style="object-fit: cover" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<small>
															{{ date('d F Y', strtotime($item->published_at)) }}
														</small>
														<h5 class="card-title">{{ Str::limit(strip_tags($item->judul), 80) }}</h5>
														<p class="card-text">{!! Str::limit(strip_tags($item->content), 180) !!}</p>
														<p class="card-text"><small class="text-muted">Penulis : {{ $item->author }}</small></p>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							@endforeach
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
