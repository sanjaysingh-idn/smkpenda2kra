@extends('admin.layouts.main')

@section('content')
	<div class="row">
		<h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }} Admin</h2>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="text-start">
						<h5 class="card-title">Halaman Kelola Data Admin</h5>
						<p class="text-muted mt-2" style="font-size: 14px;">
							Halaman ini digunakan untuk mengelola data admin pengelola website, termasuk menambahkan admin baru, serta
							mengedit informasi seperti email dan password.
						</p>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
							<i class="bx bx-plus-circle"></i> Tambah User Admin
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive text-nowrap">
						<table id="adminTable" class="table table-hover">
							<caption class="ms-4">

							</caption>
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach ($userAdmin as $item)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->email }}</td>
										<td>
											<button class="btn btn-warning btn-sm" data-bs-toggle="modal"
												data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit me-1"></i> Edit</button>
											@if ($item->email !== Auth::user()->email)
												<button class="btn btn-danger btn-sm" data-bs-toggle="modal"
													data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Hapus</button>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card mt-3">
				<div class="card-header">
					<div class="text-start">
						Halaman Edit Data Siswa
					</div>
					<p class="text-muted mt-2" style="font-size: 14px;">
						Halaman ini digunakan untuk mengubah data siswa seperti password dan email. Silakan pilih siswa dari daftar di
						bawah untuk mengedit informasi mereka.
					</p>
				</div>
				<div class="card-body">
					<div class="table-responsive text-nowrap">
						<table id="siswaTable" class="table table-hover">
							<caption class="ms-4">

							</caption>
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach ($userSiswa as $item)
									@if ($item->email !== Auth::user()->email)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $item->name }}</td>
											<td>{{ $item->email }}</td>
											<td>
												<button class="btn btn-warning btn-sm" data-bs-toggle="modal"
													data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit me-1"></i> Edit</button>
												<button class="btn btn-danger btn-sm" data-bs-toggle="modal"
													data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Hapus</button>
											</td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('modals')

	{{-- Modal Tambah --}}
	<div class="modal fade" id="modalAdd" tabindex="-1" aria-modal="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-primary pb-3">
					<h5 class="modal-title text-white" id="modalAddTitle">Tambah User Admin</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="{{ route('admin.user.store') }}">
					@csrf
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12 mb-3">
								<label for="name" class="form-label">Nama</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
									placeholder="Nama" value="{{ old('name') }}">
								@error('name')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="col-sm-12 mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
									placeholder="Email" value="{{ old('email') }}">
								@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="col-sm-12 mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
									id="password" placeholder="*******">
								@error('password')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Tambah Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- Modal Edit --}}
	@foreach ($userAdmin as $item)
		<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-warning pb-3">
						<h5 class="modal-title text-white" id="modalAddTitle">Edit User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="post" action="{{ route('admin.user.update', $item->id) }}">
						@csrf
						@method('put')
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12 mb-3">
									<label for="name" class="form-label">Nama</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
										placeholder="Nama" value="{{ $item->name }}">
									@error('name')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-12 mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
										id="email" placeholder="Email" value="{{ $item->email }}">
									@error('email')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-12 mb-3">
									<label for="password" class="form-label">Password</label>
									<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
										id="password" placeholder="*******" value="{{ $item->password }}">
									@error('password')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-warning"><i class="bx bx-save"></i> Edit Data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach

	{{-- Modal Delete --}}
	@foreach ($userAdmin as $item)
		<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('admin.user.destroy', $item->id) }}" method="POST">
						@csrf
						@method('delete')
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									Apakah anda yakin ingin menghapus data User <strong>{{ $item->name }}</strong> ?
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Hapus data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach
	{{-- Modal Edit --}}
	@foreach ($userSiswa as $item)
		<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-warning pb-3">
						<h5 class="modal-title text-white" id="modalAddTitle">Edit User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="post" action="{{ route('admin.user.update', $item->id) }}">
						@csrf
						@method('put')
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12 mb-3">
									<label for="name" class="form-label">Nama</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
										placeholder="Nama" value="{{ $item->name }}">
									@error('name')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-12 mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
										id="email" placeholder="Email" value="{{ $item->email }}">
									@error('email')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-12 mb-3">
									<label for="password" class="form-label">Password</label>
									<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
										id="password" placeholder="*******" value="{{ $item->password }}">
									@error('password')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-warning"><i class="bx bx-save"></i> Edit Data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach

	{{-- Modal Delete --}}
	@foreach ($userSiswa as $item)
		<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('admin.user.destroy', $item->id) }}" method="POST">
						@csrf
						@method('delete')
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									Apakah anda yakin ingin menghapus data User <strong>{{ $item->name }}</strong> ?
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Hapus data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach

@endpush
