@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }} </h2>
    <div class="col-12">
        <a href="/admin/berita" class="btn btn-secondary my-2">
            << Kembali </a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <h4>Form Tambah Berita</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul') }}">
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <br>
                                <label for="foto" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="foto @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/png, image/jpeg" hidden>
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
                            <div class="col-sm-12 mb-3">
                                <label for="desc" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="content" id="desc" rows="5">{{ old('content') }}</textarea>
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
</div>
@endsection

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
@push('scripts')
<script>
    function showFileNames(input) {
        var fileNames = "";
        for (var i = 0; i < input.files.length; i++) {
            fileNames += input.files[i].name + "<br>";
        }
        document.getElementById('file-names').innerHTML = fileNames;
    }

    function resetForm() {
        var input = document.querySelector('input[type="file"]');
        input.value = '';
        document.getElementById('file-names').innerHTML = '';
    }
</script>
@endpush