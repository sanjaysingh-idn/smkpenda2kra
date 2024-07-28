@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <a href="{{ route('admin.program-keahlian.create') }}" class="btn btn-primary"><i class="bx bx-info-circle me-1"></i>Tambah Program Keahlian</a>
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
                                <th>Nama Program</th>
                                <th class="text-center">Foto Utama</th>
                                <th>Deskripsi</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($proke as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_program }} ({{ $item->singkatan }})</td>
                                <td class="d-flex justify-content-center">
                                    <img src="{{ asset('storage/'. $item->foto_utama) }}" alt="Foto {{ $item->judul }}" class="img-thumbnail w-50">
                                </td>
                                <td class="text-truncate">{{ Str::limit(strip_tags($item->desc), 30) }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-circle me-1"></i> Detail</button>
                                    <a href="{{ route('admin.program-keahlian.edit',['program_keahlian' => $item->id]) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Hapus</button>
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

{{-- Modal Detail--}}
@foreach ($proke as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalDetailTitle">Detail Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2 mb-3">
                        <p>Judul</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <p>{{ $item->nama_program }} ({{ $item->singkatan }})</p>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Deskripsi</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        {!! $item->desc !!}
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Foto Utama</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <img class="img-thumbnail" width="200" src="{{ asset('storage/'. $item->foto_utama) }}" alt="Foto {{ $item->judul }}" class="img-thumbnail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Delete --}}
@foreach ($proke as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.program-keahlian.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            Apakah anda yakin ingin menghapus data Program Keahlian <strong>{{ $item->nama_program }}</strong> ?
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

@push('scripts')
<script src="{{ asset('temp_back/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#desc'
    });
</script>
@endpush