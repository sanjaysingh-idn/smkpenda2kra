@extends('home.layouts.app')

@section('content')

<section id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
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
                        @foreach ($galeri as $item)
                        <div class="col-md-4">
                            <div class="team-member">
                                <div class="image">
                                    <img src="{{ asset('storage/'. $item->foto) }}" alt="">
                                    <div class="social-icons">

                                    </div>
                                </div>

                                <h5>{{ $item->keterangan }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </span>
            </div>
            <div class="col-md-3">
                <span data-aos="fade-down">
                    <div class="row">
                        @foreach ($brosur as $item)
                        <div class="col-12 mb-3">
                            <img src="{{ asset('storage/'. $item->foto) }}" class="rounded-start img-fluid" alt="...">
                            <a href="{{ asset('storage/'. $item->foto) }}" download="{{ $item->nama_brosur }}" class="btn btn-primary mt-3">
                                Download
                            </a>
                        </div>
                        @endforeach
                    </div>
                </span>
            </div>
        </div>
    </div>
</section>
@endsection