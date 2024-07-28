@extends('home.layouts.app')

@section('content')

<section id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <span data-aos="fade-right">
                    <h2 class="text-uppercase text-center mb-3">
                        {{ $title }}
                    </h2>
                </span>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-9">
                <span data-aos="fade-down">
                    <div class="row">
                        <div class="col-12">
                            <div class="syarat">
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Daftar PPDB, buat akun terlebih dahulu.</h4>
                                    <p>Calon siswa diharuskan membuat akun dan login untuk melakukan pendaftaran PPDB</p>
                                    <hr>
                                    <p class="mb-0">Silahkan klik <a href="{{ route('register') }}">disini</a> untuk pendaftaran akun, atau klik <a href="{{ route('login') }}">disini</a> jika sudah mempunyai akun</p>
                                </div>
                                <h3>Syarat Pendaftaran Siswa Baru</h3>
                                <small>Status PPDB : <span class="badge rounded-pill bg-primary">{{ $syarat->status }}</span></small>
                                <br>
                                <div class="text">
                                    {!! $syarat->content !!}
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </span>
            </div>
            <div class="col-md-3">
                <span data-aos="fade-down">
                    <div class="row">
                        @if ($brosur)
                        @foreach ($brosur as $item)
                        <div class="col-12 mb-3">
                            <img src="{{ asset('storage/'. $item->foto) }}" class="rounded-start img-fluid" alt="...">
                            <a href="{{ asset('storage/'. $item->foto) }}" download="{{ $item->nama_brosur }}" class="btn btn-primary mt-3">
                                Download
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </span>
            </div>
        </div>
    </div>
</section>
@endsection