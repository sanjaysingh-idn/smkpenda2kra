@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="table" class="table table-hover">
                        <caption class="ms-4">

                        </caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($sambutan as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->kepala_sekolah }}</td>
                                <td class="d-flex justify-content-center">
                                    <img src="{{ asset('storage/'. $item->foto) }}" alt="{{ $item->kepala_sekolah }}" class="img-thumbnail" style="width: 100px">
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-circle me-1"></i> Detail</button>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit me-1"></i> Edit</button>
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

{{-- Modal Edit --}}
@foreach ($sambutan as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalAddTitle">Edit Sambutan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.sambutan.update',$item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="kepala_sekolah" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('kepala_sekolah') is-invalid @enderror" name="kepala_sekolah" id="kepala_sekolah" value="{{ $item->kepala_sekolah }}">
                            @error('kepala_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <img src="{{ asset('storage/'. $item->foto) }}" alt="Foto {{ $item->judul }}" class="img-thumbnail w-50">
                            <br>
                            <label for="foto" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload Foto Utama</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="foto @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/png, image/jpeg" hidden>
                            </label>
                            <img src="{{ asset('storage/defaultImage.png') }}" alt="default-image" class="d-block rounded" height="100" id="uploadedFoto" />
                            <button type="button" class="btn btn-outline-primary foto_reset my-2">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <p class="text-muted mb-0">File berupa JPG,JPEG, PNG. Max 2MB</p>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="desc" class="form-label">Sambutan</label>
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
@foreach ($sambutan as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalDetailTitle">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2 mb-3">
                        <p>Nama</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <p>{{ $item->kepala_sekolah }}</p>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Foto</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <p>
                            <img src="{{ asset('storage/'. $item->foto) }}" alt="{{ $item->kepala_sekolah }}" class="img-thumbnail w-50">
                        </p>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Deskripsi</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        {!! $item->desc !!}
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

@endpush

@push('scripts')
<script src="{{ asset('temp_back/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#desc'
    });
</script>
<script>
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
    const deactivateAcc = document.querySelector('#formAccountDeactivation');
    
    // Update/reset user image of account page
    let foto = document.getElementById('uploadedFoto');
    const fileInput = document.querySelector('.foto'),
    resetFileInput = document.querySelector('.foto_reset');
    
    if (foto) {
    const resetImage = foto.src;
    fileInput.onchange = () => {
    if (fileInput.files[0]) {
    foto.src = window.URL.createObjectURL(fileInput.files[0]);
    }
    };
    resetFileInput.onclick = () => {
    fileInput.value = '';
    foto.src = resetImage;
    };
    }
    })();
    });
</script>
@endpush