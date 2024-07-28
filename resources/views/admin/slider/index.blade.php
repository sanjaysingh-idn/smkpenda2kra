@extends('admin.layouts.main')

@section('content')
	<div class="row">
		<h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<div class="text-start">
						<a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
							<i class="bx bx-info-circle me-1"></i>
							Tambah Slider
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive text-nowrap">
						<table id="table" class="table table-hover">
							<caption class="ms-4">

							</caption>
							<thead>
								<tr>
									<th>No</th>
									<th>Teks</th>
									<th class="text-center">Foto</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@php
									$no = 1;
								@endphp
								@foreach ($slider as $item)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $item->text }}</td>
										<td align="center">
											<img src="{{ asset('storage/' . $item->foto) }}" alt="Foto {{ $item->text }}" class="img-thumbnail w-50">
										</td>
										<td>
											<button class="btn btn-danger btn-sm" data-bs-toggle="modal"
												data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Hapus</button>
										</td>
									</tr>
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
	{{-- Modal Delete --}}
	@foreach ($slider as $item)
		<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Slider</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{ route('admin.slider.destroy', $item->id) }}" method="POST">
						@csrf
						@method('delete')
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									Apakah anda yakin ingin menghapus slider <strong>{{ $item->judul }}</strong> ?
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
