@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <a href="/admin/program-keahlian" class="btn btn-secondary my-2">
            << Kembali </a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <h4>Form tambah data Program Keahlian</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.program-keahlian.update', ['program_keahlian' => $program->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="nama_program" class="form-label">Nama Program</label>
                                <input type="text" class="form-control @error('nama_program') is-invalid @enderror" name="nama_program" id="nama_program" value="{{ $program->nama_program }}">
                                @error('nama_program')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="singkatan" class="form-label">Singkatan</label>
                                <input type="text" class="form-control @error('singkatan') is-invalid @enderror" name="singkatan" id="singkatan" value="{{ $program->singkatan }}">
                                @error('singkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="foto_utama" class="form-label">Foto Utama</label>
                                <img src="{{ asset('storage/'. $program->foto_utama) }}" alt="Foto {{ $program->judul }}" class="img-thumbnail w-50">
                                <br>
                                <label for="foto_utama" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload Foto Utama</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" class="foto_utama @error('foto_utama') is-invalid @enderror" id="foto_utama" name="foto_utama" accept="image/png, image/jpeg" hidden>
                                </label>
                                <img src="{{ asset('storage/defaultImage.png') }}" alt="default-image" class="d-block rounded" height="100" id="uploadedFoto" />
                                <button type="button" class="btn btn-outline-primary foto_utama_reset my-2">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                @error('foto_utama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <p class="text-muted mb-0">File berupa JPG,JPEG, PNG. Max 2MB</p>
                            </div>
                            <div class="col-6 mb-3">

                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="desc" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="desc" id="desc" rows="5">{{ $program->desc }}</textarea>
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
</div>
@endsection

@push('scripts')
<script src="{{ asset('temp_back/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    setTimeout(function() {
        tinymce.init({
            selector: '#desc',
            plugins: 'table',
        });
    }, 100);
</script>
@endpush
@push('scripts')
<script>
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function (e) {
        (function () {
        const deactivateAcc = document.querySelector('#formAccountDeactivation');
        
        // Update/reset user image of account page
        let fotoUtama = document.getElementById('uploadedFoto');
        const fileInput = document.querySelector('.foto_utama'),
        resetFileInput = document.querySelector('.foto_utama_reset');
    
        if (fotoUtama) {
            const resetImage = fotoUtama.src;
            fileInput.onchange = () => {
                if (fileInput.files[0]) {
                fotoUtama.src = window.URL.createObjectURL(fileInput.files[0]);
            }
        };
            resetFileInput.onclick = () => {
            fileInput.value = '';
            fotoUtama.src = resetImage;
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