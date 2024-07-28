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
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($fasilitas as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->total }}</td>
                                <td>
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
@foreach ($fasilitas as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalAddTitle">Edit Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('admin.fasilitas.update',$item->id) }}">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="{{ $item->keterangan }}">
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" class="form-control @error('total') is-invalid @enderror" name="total" id="total" value="{{ $item->total }}">
                            @error('total')
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

@endpush