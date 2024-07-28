@extends('admin.layouts.main')

@section('content')
	<div class="row">
		<h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive text-nowrap">
						<table id="table" class="table table-hover">
							<caption class="ms-4">

							</caption>
							<thead>
								<tr>
									<th>Update at</th>
									<th>Author</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($siswa as $item)
									<tr>
										<td>
											{{ $item->updated_at }}
										</td>
										<td>{{ $item->author }}</td>
										<td>
											<button class="btn btn-warning btn-sm" data-bs-toggle="modal"
												data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit me-1"></i> Edit</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3 mt-2">
			<div class="card">
				<div class="card-header">
					<a href="">Upload Grafik Siswa</a>
				</div>
				<div class="card-body">
					@if (session('message'))
						<div class="alert alert-success">
							{{ session('message') }}
						</div>
					@endif
					<form action="{{ route('admin.addGrafik') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group mb-3">
							<label for="grafik">Upload Grafik</label>
							<input type="file" class="form-control" id="grafik" name="grafik" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-9 mt-2">
			<div class="card">
				<div class="card-header">
					Data Grafik Siswa
				</div>
				<div class="card-body">
					@foreach ($siswa as $data)
						<div class="img-thumbnail mb-3">
							<img src="{{ asset('storage/' . $data->grafik) }}" alt="Grafik Siswa" class="img-fluid">
						</div>
						<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i
								class="bx bx-trash me-1"></i> Hapus</button>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@push('modals')
	{{-- Modal Edit --}}
	@foreach ($siswa as $item)
		<div class="modal fade myModal" id="modalEdit{{ $item->id }}" tabindex="-3" aria-modal="true">
			<div class="modal-dialog modal-xl modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-warning pb-3">
						<h5 class="modal-title text-white" id="modalEditTitle">Edit Data Siswa</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="post" action="{{ route('admin.siswa.update', $item->id) }}">
						@csrf
						@method('put')
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12 mb-3">
									<label for="content" class="form-label">Konten</label>
									<textarea class="form-control" name="content" id="desc" rows="5">{{ $item->content }}</textarea>
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
	@foreach ($siswa as $item)
		<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Grafik</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('admin.deleteGrafik', $item->id) }}" method="POST">
						@csrf
						@method('delete')
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									Apakah anda yakin ingin Grafik ini?
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Hapus Grafik</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach
@endpush

@push('scripts')
	<script src="{{ asset('temp_back/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
	<script>
		tinymce.init({
			selector: '#desc',
			plugins: 'table',
		});

		document.addEventListener('focusin', (e) => {
			if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
				e.stopImmediatePropagation();
			}
		});
	</script>
@endpush
