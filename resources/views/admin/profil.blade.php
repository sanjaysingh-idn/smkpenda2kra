@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Data Profil</button> --}}
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
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Deskripsi</th>
                                <th>Diinput</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($profil as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td class="text-truncate">{{ Str::limit(strip_tags($item->desc), 50) }}</td>
                                <td>{{ $item->input_by }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-circle me-1"></i> Detail</button>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit me-1"></i> Edit</button>
                                    {{-- <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Hapus</button> --}}
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

{{-- Modal Tambah --}}
{{-- <div class="modal fade" id="modalAdd" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.profil.store') }}" enctype="multipart/form-data">
@csrf
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12 mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Visi & Misi">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-sm-12 mb-3">
            <label for="desc" class="form-label"></label>
            <textarea class="form-control" name="desc" id="desc" rows="5">{{ old('desc') }}</textarea>
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
</div> --}}

{{-- Modal Edit --}}
@foreach ($profil as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalAddTitle">Tambah Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.profil.update',$item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $item->title }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="desc" class="form-label"></label>
                            <textarea class="form-control" name="desc" id="desc" rows="5">{{ $item->desc }}</textarea>
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

{{-- Modal Detail--}}
@foreach ($profil as $item)
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
                        <p>{{ $item->title }}</p>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Deskripsi</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        {!! $item->desc !!}
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Edit By</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        {{ $item->input_by }}
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
@foreach ($profil as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.profil.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            Apakah anda yakin ingin menghapus data Profil <strong>{{ $item->title }}</strong> ?
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