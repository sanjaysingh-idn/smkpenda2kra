@extends('home.layouts.app')

@section('content')

<section id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

            </div>
            <div class="col-md-9">
                <span data-aos="fade-right">
                    <h2 class="text-uppercase text-center mb-3">
                        {{ $title }}
                    </h2>
                </span>
            </div>
            <div class="col-md-3">
                <a href="{{ url('akademik/data-guru') }}" class="badge bg-egyptian-blue text-decoration-none p-3 rounded-3 mb-2 w-100 text-start {{ request()->is('akademik/data-guru') ? 'text-citrine' : 'text-white' }}">Data Guru</a><br>
                <a href="{{ url('akademik/data-siswa') }}" class="badge bg-egyptian-blue text-decoration-none p-3 rounded-3 mb-2 w-100 text-start {{ request()->is('akademik/data-siswa') ? 'text-citrine' : 'text-white' }}">Data Siswa</a><br>
            </div>
            <div class="col-md-9">
                <span data-aos="fade-down">
                    <div class="row">
                        @foreach ($guru as $item)
                        <div class="col-4">
                            <div class="card text-center">
                                <img class="card-img-top" src="{{ asset('storage/'.$item->foto) }}" alt="Title">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nama_guru }}</h5>
                                    <small>
                                        Jabatan : {{ $item->jabatan }}
                                        <br>
                                        Mapel : {{ $item->mata_pelajaran }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </span>
            </div>
        </div>
    </div>
</section>
@endsection