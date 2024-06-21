@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Guru</button>
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
                                <th>Nama Guru</th>
                                <th class="text-center">Foto</th>
                                <th>Jabatan</th>
                                <th>Mapel</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($guru as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_guru }}</td>
                                <td class="justify-content-center">
                                    <img src="{{ asset('storage/'. $item->foto) }}" alt="Foto {{ $item->nama_guru }}" class="img-thumbnail w-50">
                                </td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->mata_pelajaran }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-circle me-1"></i> Detail</button>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit-alt me-1"></i>Edit</button>
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
                <h5 class="modal-title" id="modalAddTitle">Tambah Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.guru.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru" id="nama_guru" value="{{ old('nama_guru') }}">
                            @error('nama_guru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                            <div class=" invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ old('jabatan') }}">
                            @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror" name="mata_pelajaran" id="mata_pelajaran" value="{{ old('mata_pelajaran') }}">
                            @error('mata_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="status" class="form-label">status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" id="status" value="{{ old('status') }}">
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="foto" class="form-label">Foto Guru</label>
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

{{-- Modal Edit--}}
@foreach ($guru as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalEditTitle">Edit Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.guru.update',$item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru" id="nama_guru" value="{{ $item->nama_guru }}">
                            @error('nama_guru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="{{ $item->tempat_lahir }}">
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ $item->tanggal_lahir }}">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ $item->alamat }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ $item->jabatan }}">
                            @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror" name="mata_pelajaran" id="mata_pelajaran" value="{{ $item->mata_pelajaran }}">
                            @error('mata_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="status" class="form-label">status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" id="status" value="{{ $item->status }}">
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="foto" class="form-label">Foto Guru</label>
                            <img src="{{ asset('storage/'. $item->foto) }}" alt="Foto {{ $item->nama_guru }}" class="img-thumbnail w-50">
                            <br>
                            <label for="formFileSm" class="form-label">Edit Foto</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto">
                            <p class="text-muted my-2">File berupa JPG,JPEG, PNG. Max 2MB</p>
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
@foreach ($guru as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info pb-3">
                <h5 class="modal-title text-white" id="modalDetailTitle">Detail Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img class="img-thumbnail mx-auto shadow" width="200" src="{{ asset('storage/'. $item->foto) }}" alt="Foto {{ $item->nama_guru }}" class="img-thumbnail">
                    </div>
                    <div class="col-12">
                        <div class="table-responsive text-nowrap">
                            <table id="table" class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td class="bg-info text-white">Nama</td>
                                        <td>{{ $item->nama_guru }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-info text-white">TTL</td>
                                        <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-info text-white">Alamat</td>
                                        <td>{{ $item->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-info text-white">Jabatan</td>
                                        <td>{{ $item->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-info text-white">Mata Pelajaran</td>
                                        <td>{{ $item->mata_pelajaran }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-info text-white">Status</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
@foreach ($guru as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.guru.delete', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            Apakah anda yakin ingin menghapus data Guru, <strong>{{ $item->nama_guru }}</strong> ?
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
    $(document).ready(function(){
        $('#table').DataTable({
            // "dom": 'rtip',
            'responsive': true,
        });
    });

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