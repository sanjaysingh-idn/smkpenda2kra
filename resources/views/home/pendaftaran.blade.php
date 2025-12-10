@extends('home.layouts.app')

@section('content')
	<section id="about">
		<div class="container">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if (session()->has('message'))
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					<strong>Pendaftaran Siswa Berhasil!</strong> Pendaftar yang diterima akan dihubungi melalui whatsapp dan email
					segera.
				</div>
			@endif

			<div class="row justify-content-center">
				<div class="col-md-12">
					<span data-aos="fade-right">
						<h2 class="text-uppercase text-center mb-3">
							{{ $title }}
						</h2>
					</span>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-12 bg-white p-4">
					<span data-aos="fade-down">
						<div class="row">
							<div class="col-12">
								@if ($syarat->status === 'dibuka')
									<div class="syarat">
										<h3>Syarat Pendaftaran Siswa Baru</h3>
										<small>Status PPDB : <span class="badge rounded-pill bg-primary">{{ $syarat->status }}</span></small>
										<br>
										<div class="text">
											{!! $syarat->content !!}
										</div>
									</div>
								@else
									<small>Status PPDB : <span class="badge rounded-pill bg-primary">{{ $syarat->status }}</span></small>
									<div class="alert alert-warning text-center p-4 mt-4" style="font-size: 1.3rem; font-weight: 600;">
										Mohon maaf, Penerimaan Peserta Didik Baru (PPDB) saat ini ditutup.
										<br>Silakan menunggu informasi resmi selanjutnya.
									</div>
								@endif
							</div>
							<hr>
							<div class="col-12">
								@if (!Auth::user()->id_ppdb)
									@if ($syarat->status === 'dibuka')
										<h3>Formulir Pendaftaran</h3>
										<hr>
										<div class="form">
											<form method="post" action="{{ route('pendaftaran-siswa.store') }}" enctype="multipart/form-data">
												@csrf
												<div class="row">
													<h5>Data Diri</h5>
													<div class="col-sm-12 mb-3">
														<label for="formFileLg" class="form-label">Pas Foto</label>
														<input class="form-control form-control-lg bg-citrine @error('pas_foto') is-invalid @enderror"
															id="formFileLg" name="pas_foto" type="file" accept="image/*" required>
														<small>Foto Max 2MB. Format PNG/JPG/JPEG</small>
														@error('pas_foto')
															<div class="invalid-feedback">
																{{ $message }}
															</div>
														@enderror
													</div>
													<div class="col-md-6">
														<h5>Data Diri</h5>
														<div class="row">
															<div class="col-sm-12 mb-3">
																<label for="nama" class="form-label">Nama</label>
																<input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
																	id="nama" value="{{ old('nama') }}" required>
																@error('nama')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
															<div class="col-sm-12 mb-3">
																<label for="" class="form-label">Jenis Kelamin</label>
																<select class="form-select form-select-lg" name="jenis_kelamin" id="" required>
																	<option value="" hidden>--Pilih Jenis Kelamin--</option>
																	<option value="Laki-laki">Laki-laki</option>
																	<option value="Perempuan">Perempuan</option>
																</select>
															</div>
															<div class="col-sm-12 mb-3">
																<label for="" class="form-label">Agama</label>
																<select class="form-select form-select-lg" name="agama" id="" required>
																	<option value="" hidden>--Pilih Agama--</option>
																	@foreach ($agama as $a)
																		<option value="{{ $a }}">{{ $a }}</option>
																	@endforeach
																</select>
															</div>
															<div class="col-sm-12 mb-3">
																<label for="email" class="form-label">Email</label>
																<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
																	id="email" value="{{ old('email') }}" required>
																@error('email')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
															<div class="col-sm-12 mb-3">
																<label for="nisn" class="form-label">NISN</label>
																<input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn"
																	id="nisn" value="{{ old('nisn') }}" maxlength="10" required>
																@error('nisn')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
															<div class="col-sm-6 mb-3">
																<label for="tempat_lahir" class="form-label">Tempat Lahir</label>
																<input type="type" class="form-control @error('tempat_lahir') is-invalid @enderror"
																	name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
																@error('tempat_lahir')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
															<div class="col-sm-6 mb-3">
																<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
																<input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
																	name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
																@error('tanggal_lahir')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
															<div class="col-sm-12 mb-3">
																<label for="alamat" class="form-label text-capitalize">alamat</label>
																<input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
																	id="alamat" value="{{ old('alamat') }}" required>
																@error('alamat')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
															<div class="col-sm-12 mb-3">
																<label for="no_telp" class="form-label text-capitalize">No telp / HP</label>
																<input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
																	id="no_telp" value="{{ old('no_telp') }}" required maxlength="13">
																@error('no_telp')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
															<div class="col-sm-12 mb-3">
																<label for="asal_sekolah" class="form-label text-capitalize">Asal Sekolah</label>
																<input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror"
																	name="asal_sekolah" id="asal_sekolah" value="{{ old('asal_sekolah') }}" required>
																@error('asal_sekolah')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<h5>Data Orang Tua / Wali</h5>
														<div class="col-sm-12 mb-3">
															<label for="nik" class="form-label text-capitalize">NIK (Sesuai KK)</label>
															<input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"
																id="nik" value="{{ old('nik') }}" maxlength="16" required>
															@error('nik')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>
														<div class="col-sm-12 mb-3">
															<label for="nama_ayah" class="form-label text-capitalize">Nama Ayah</label>
															<input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah"
																id="nama_ayah" value="{{ old('nama_ayah') }}" required>
															@error('nama_ayah')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>
														<div class="col-sm-12 mb-3">
															<label for="pekerjaan_ayah" class="form-label text-capitalize">Pekerjaan Ayah</label>
															<input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
																name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
															@error('pekerjaan_ayah')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>
														<div class="col-sm-12 mb-3">
															<label for="nama_ibu" class="form-label text-capitalize">nama ibu</label>
															<input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
																id="nama_ibu" value="{{ old('nama_ibu') }}" required>
															@error('nama_ibu')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>
														<div class="col-sm-12 mb-3">
															<label for="pekerjaan_ibu" class="form-label text-capitalize">Pekerjaan ibu</label>
															<input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
																name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
															@error('pekerjaan_ibu')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>
														<div class="col-sm-12 mb-3">
															<label for="no_telp_ortu" class="form-label text-capitalize">No Telp/HP Orang Tua / Wali</label>
															<input type="number" class="form-control @error('no_telp_ortu') is-invalid @enderror"
																name="no_telp_ortu" id="no_telp_ortu" value="{{ old('no_telp_ortu') }}" maxlength="13" required>
															@error('no_telp_ortu')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>
														<div class="col-sm-12 mb-3">
															<label for="" class="form-label">Penghasilan Orang Tua</label>
															<select class="form-select form-select-lg" name="penghasilan_ortu" id="" required>
																<option value="" hidden>--Pilih Penghasilan Orang Tua--</option>
																@foreach ($penghasilan_ortu as $p)
																	<option value="{{ $p }}">{{ $p }}</option>
																@endforeach
															</select>
														</div>
														<h4>Jurusan yang diminati</h4>
														<div class="col-sm-12 mb-3">
															<label for="" class="form-label">Daftar Jurusan</label>
															<select class="form-select form-select-lg" name="jurusan" id="" required>
																<option value="" hidden>--Pilih Jurusan--</option>
																@foreach ($programs as $pk)
																	<option value="{{ $pk->nama_program }}">{{ $pk->nama_program }} ({{ $pk->singkatan }})</option>
																@endforeach
															</select>
														</div>
													</div>
													<br>
													<hr>

													<br>
													<hr>

												</div>
												<div class="row">
													<h5>Upload Berkas</h5>
													<!-- Scan Raport -->
													<div class="col-md-6">
														<div class="row">
															<div class="col-sm-12 mb-3">
																<label for="scan_raport" class="form-label">Scan Raport</label>
																<input class="form-control form-control-lg bg-citrine @error('scan_raport') is-invalid @enderror"
																	id="scan_raport" name="scan_raport" type="file" accept=".jpg,.jpeg,.png,.pdf" required>
																<small>Max 2MB. Format JPG/PNG/PDF</small>
																@error('scan_raport')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>

															<!-- Scan Akta -->
															<div class="col-sm-12 mb-3">
																<label for="scan_akta" class="form-label">Scan Akta Kelahiran</label>
																<input class="form-control form-control-lg bg-citrine @error('scan_akta') is-invalid @enderror"
																	id="scan_akta" name="scan_akta" type="file" accept=".jpg,.jpeg,.png,.pdf" required>
																<small>Max 2MB. Format JPG/PNG/PDF</small>
																@error('scan_akta')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>

															<!-- Scan KK -->
															<div class="col-sm-12 mb-3">
																<label for="scan_kk" class="form-label">Scan Kartu Keluarga</label>
																<input class="form-control form-control-lg bg-citrine @error('scan_kk') is-invalid @enderror"
																	id="scan_kk" name="scan_kk" type="file" accept=".jpg,.jpeg,.png,.pdf" required>
																<small>Max 2MB. Format JPG/PNG/PDF</small>
																@error('scan_kk')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																@enderror
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<!-- Piagam 1 -->
														<div class="col-sm-12 mb-3">
															<label for="scan_piagam1" class="form-label">Scan Piagam 1 (Opsional)</label>
															<input class="form-control form-control-lg bg-citrine @error('scan_piagam1') is-invalid @enderror"
																id="scan_piagam1" name="scan_piagam1" type="file" accept=".jpg,.jpeg,.png,.pdf">
															<small>Max 2MB. Format JPG/PNG/PDF</small>
															@error('scan_piagam1')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>

														<!-- Piagam 2 -->
														<div class="col-sm-12 mb-3">
															<label for="scan_piagam2" class="form-label">Scan Piagam 2 (Opsional)</label>
															<input class="form-control form-control-lg bg-citrine @error('scan_piagam2') is-invalid @enderror"
																id="scan_piagam2" name="scan_piagam2" type="file" accept=".jpg,.jpeg,.png,.pdf">
															<small>Max 2MB. Format JPG/PNG/PDF</small>
															@error('scan_piagam2')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>

														<!-- Piagam 3 -->
														<div class="col-sm-12 mb-3">
															<label for="scan_piagam3" class="form-label">Scan Piagam 3 (Opsional)</label>
															<input class="form-control form-control-lg bg-citrine @error('scan_piagam3') is-invalid @enderror"
																id="scan_piagam3" name="scan_piagam3" type="file" accept=".jpg,.jpeg,.png,.pdf">
															<small>Max 2MB. Format JPG/PNG/PDF</small>
															@error('scan_piagam3')
																<div class="invalid-feedback">
																	{{ $message }}
																</div>
															@enderror
														</div>
													</div>

													<button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Daftar Siswa</button>
											</form>
									@endif
							</div>
						@else
							<p>Anda sudah mendaftar, silahkan ke halaman <a href="{{ route('panel-siswa', ['id' => Auth::id()]) }}">panel
									siswa</a> untuk cek status pendaftaran</p>
							@endif
						</div>
				</div>
				</span>
			</div>
			{{-- <div class="col-md-3">
                <span data-aos="fade-down">
                    <div class="row">
                        @if ($brosur)
                        @foreach ($brosur as $item)
                        <div class="col-12 mb-3">
                            <img src="{{ asset('storage/'. $item->foto) }}" class="rounded-start img-fluid" alt="...">
                            <a href="{{ asset('storage/'. $item->foto) }}" download="{{ $item->nama_brosur }}" class="btn btn-primary mt-3">
                                Download
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </span>
            </div> --}}
		</div>
		</div>
	</section>
@endsection
