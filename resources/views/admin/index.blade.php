@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Selamat Datang di Halaman Admin <strong>{{ $title }}</strong></h5>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('temp_back') }}/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h3 style="letter-spacing: 3px"><strong>Data Fasilitas Sekolah</strong></h3>
        <div class="row">
            @foreach ($fasilitas as $f)
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="flex-shrink-0">
                                <div class="alert-light rounded text-center p-1">
                                    @if ($f->keterangan == 'Total Siswa')
                                    <i class="bx bx-user text-primary fs-3"></i>
                                    @elseif ($f->keterangan == 'Ruang Kelas')
                                    <i class="bx bx-home text-danger fs-3"></i>
                                    @elseif ($f->keterangan == 'Fasilitas')
                                    <i class="bx bxs-school text-warning fs-3"></i>
                                    @elseif ($f->keterangan == 'Total Pengajar')
                                    <i class="bx bxs-user-badge text-info fs-3"></i>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">{{ $f->keterangan }}</span>
                        <h3 class="card-title mb-2">{{ $f->total }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection