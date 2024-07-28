@extends('home.layouts.app')

@section('content')
	<section id="about">
		<div class="container">
			<div class="card">
				<div class="card-body">
					<div class="row justify-content-center">
						<span data-aos="fade-right">
							<h2 class="text-uppercase text-center mb-3">{{ $title }}</h2>
						</span>
						@if ($siswa->id_ppdb)
							<div class="col-sm-4">
								<div class="card mb-4">
									<div class="card-body text-center">
										<img src="{{ asset('storage/' . $pendaftaran->pas_foto) }}" alt="Foto {{ $pendaftaran->nama }}"
											class="rounded-circle img-fluid" style="width: 150px;">
									</div>
								</div>
								<div class="card mb-4">
									<div class="card-body text-center">
										<p>Status Pendaftaran : <span class="text-uppercase fw-bold">{{ $pendaftaran->status }}</span></p>
										<p>Jurusan : <span class="text-uppercase fw-bold">{{ $pendaftaran->jurusan }}</span></p>
									</div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="card mb-4">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">Nama Lengkap</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->nama }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">Email</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->email }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">No Telp / WA</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->no_telp }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">alamat</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->alamat }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">Tempat Tgl Lahir</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->tempat_lahir }},
													{{ date('d F Y', strtotime($pendaftaran->tanggal_lahir)) }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">nisn</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->nisn }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">asal sekolah</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->asal_sekolah }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">nama ayah</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->nama_ayah }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">nama ibu</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->nama_ibu }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">nama ibu</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->nama_ibu }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">pekerjaan ayah</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->pekerjaan_ayah }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">pekerjaan ibu</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->pekerjaan_ibu }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">No Telp ORTU</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->no_telp_ortu }}</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0 text-capitalize">penghasilan ORTU</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0">{{ $pendaftaran->penghasilan_ortu }}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						@else
							<p>Anda belum melakukan pendafaran siswa baru. Silahkan melakukan pendaftaran <a
									href="{{ url('pendaftaran') }}">disini</a></p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
