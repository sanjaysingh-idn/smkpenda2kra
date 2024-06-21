@extends('home.layouts.app')

@section('content')
	<div class="container">
		<div class="text-center">
			<h1>
				<span class="bg-egyptian-blue text-citrine">
					Selamat Datang di SMK Penda 2 Karanganyar
				</span>
			</h1>
			@if (Auth::check())
				@if (Auth::user()->role == 'siswa')
					<a href="{{ url('pendaftaran-siswa') }}" class="btn bg-citrine text-egyptian-blue fw-bold" data-aos="fade-in"><i
							class='bx bx-user-plus'></i> Pendaftaran Siswa (PPDB)</a>
				@endif
			@endif

		</div>
	</div>

	<section id="about">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 mt-1" data-aos="fade-in">
					<div class="text-center mb-3">
						<h4>{{ $sambutan->kepala_sekolah }}</h4>
						<small>Kepala Sekolah {{ $title }}</small>
					</div>
					<div class="d-flex align-items-center justify-content-start">
						<img src="{{ asset('storage/' . $sambutan->foto) }}" alt="{{ $sambutan->kepala_sekolah }}"
							class="mx-auto shadow-lg rounded-3" style="width: 200px;">
					</div>
					<br>
				</div>
				<div class="col-lg-6" data-aos="fade-in">
					<div class="row">
						<div class="col-12">
							<div class="info-box">
								<div class="ms-4" style="text-align: justify;">
									{!! $sambutan->desc !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ABOUT -->
	<section id="about">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="row">

						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="intro" data-aos="fade-down">
										<h1>Program Keahlian</h1>
										<p class="mx-auto">Kembangkan keahlian Anda dengan program kami yang unggul.</p>
									</div>
								</div>
							</div>
							<div class="row">
								@foreach ($programs as $item)
									<div class="col-md-4">
										<article class="blog-post mb-3" data-aos="fade-right">
											<img src="{{ asset('storage/' . $item->foto_utama) }}" alt="">
											<a href="{{ url('program-keahlian/' . $item->slug) }}" class="tag bg-egyptian-blue"><span
													class="text-citrine"><strong>{{ $item->singkatan }}</strong></span></a>
											<div class="content">
												<h5>{{ $item->nama_program }}</h5>
												<p>
													{{ Str::limit(strip_tags($item->desc), 200) }}

												</p>
												<p class="read-more" data-slug="{{ $item->slug }}">Read More .. </p>

											</div>

										</article>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<img src="img/about.png" alt="">
				</div>
			</div>
		</div>
	</section>

	<section id="milestone">
		<div class="container">
			<div class="row text-center justify-content-center gy-4">
				{{-- @foreach ($fasilitas as $item)
            <div class="col-md-2 col-sm-6" data-aos="fade-right">
                <h1 class="display-4">{{ $item->total }}</h1>
            <p class="mb-0">{{ $item->keterangan }}</p>
        </div>
        @endforeach --}}
			</div>
		</div>
	</section>

	<section id="kontak-kami">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="intro" data-aos="fade-right">
						<h1>Hubungi Kami</h1>
						<p class="mx-auto">Kami akan dengan senang hati menjawab pertanyaan Anda.</p>
						<div class="row mt-5">
							<div class="col-md-6 bg-white p-3">
								<div class="text">
									<p><b>Alamat</b></p>
									<p>Jl, Lawu Harjosari, Popongan Karanganyar (Bangjo Bejen)</p>

									<p><b>Telepon</b></p>
									<p>(0271) 494787</p>

									<p><b>Email</b></p>
									<p>penda2kra@yahoo.co.id</p>
								</div>
								<div class="text-center mt-5">
									<p><a href="tel:0271494787" class="btn btn-primary"><i class="bx bx-phone"></i> Hubungi Kami</a></p>
								</div>
							</div>
							{{-- <div class="col-md-6">
                            <form action="/kirim-pesan" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama:</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon:</label>
                                    <input type="tel" id="telepon" name="telepon" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pesan" class="form-label">Pesan:</label>
                                    <textarea id="pesan" name="pesan" class="form-control" required></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div> --}}
							<div class="col-md-6">
								<div id="peta" style="width: 100%; height: 400px;">
									<iframe class="w-100"
										src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.7300426635406!2d110.97104651118501!3d-7.604328892379021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a2274da28e897%3A0x974989f630453670!2sSMK%20Penda%202%20Karanganyar!5e0!3m2!1sen!2sid!4v1684747985045!5m2!1sen!2sid"
										width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
										referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
