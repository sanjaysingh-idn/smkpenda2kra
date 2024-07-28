@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Brosur</button>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="table" class="table table-hover">
                        <caption class="ms-4">

                        </caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Brosur</th>
                                <th>Foto</th>
                                <th>Input By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($brosur as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_brosur }}</td>
                                <td class="justify-content-center">
                                    <img src="{{ asset('storage/'. $item->foto) }}" alt="{{ $item->nama_brosur }}" class="img-thumbnail" style="width: 100px">
                                </td>
                                <td>{{ $item->input_by }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit me-1"></i> Edit</button>
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

{{-- Modal Tambah --}}
<div class="modal fade" id="modalAdd" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Brosur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.brosur.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="input_by" value="{{ auth()->user()->name }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="nama_brosur" class="form-label">Nama Brosur</label>
                            <input type="text" class="form-control @error('nama_brosur') is-invalid @enderror" name="nama_brosur" id="nama_brosur">
                            @error('nama_brosur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="foto" class="form-label">File Brosur</label>
                            <br>
                            <label for="foto" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload File</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="foto @error('foto') is-invalid @enderror" id="foto" name="foto" hidden>
                            </label>
                            <img src="{{ asset('storage/img/image.jpg') }}" alt="default-image" class="d-block rounded" height="100" id="uploadedFoto" />
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
@foreach ($brosur as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalAddTitle">Edit Brosur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.brosur.update',$item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="input_by" value="{{ auth()->user()->name }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="nama_brosur" class="form-label">Nama Brosur</label>
                            <input type="text" class="form-control @error('nama_brosur') is-invalid @enderror" name="nama_brosur" id="nama_brosur" value="{{ $item->nama_brosur }}">
                            @error('nama_brosur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="foto" class="form-label">File</label>
                            <img src="{{ asset('storage/'. $item->foto) }}" alt="{{ $item->nama_brosur }}" class="img-thumbnail w-50">
                            <br>
                            <label for="foto" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload File</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="foto @error('foto') is-invalid @enderror" id="foto" name="foto" hidden>
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
@foreach ($brosur as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Brosur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.brosur.delete', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            Apakah anda yakin ingin menghapus Brosur <strong>{{ $item->nama_brosur }}</strong> ?
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