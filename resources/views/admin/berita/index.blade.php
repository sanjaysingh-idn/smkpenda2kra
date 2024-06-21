@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary"><i class="bx bx-info-circle me-1"></i>Tambah Berita</a>
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
                                <th>Judul</th>
                                <th class="text-center">Foto</th>
                                <th>Status</th>
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($berita as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="text-truncate">{{ Str::limit(strip_tags($item->judul), 30) }}</td>
                                <td class="justify-content-center">
                                    <img src="{{ asset('storage/'. $item->foto) }}" alt="Foto {{ $item->judul }}" class="img-thumbnail w-50">
                                </td>
                                <td>
                                    @if ($item->status == 'draft')
                                    <span class="badge rounded-pill bg-danger">Draft</span>
                                    @else
                                    <span class="badge rounded-pill bg-success">Published</span>
                                    @endif
                                </td>
                                <td>{{ $item->author }}</td>
                                <td>
                                    @if ($item->status == 'draft')
                                    <a href="{{ route('admin.berita.publish',$item->id) }}" class="btn btn-success btn-sm"><i class="bx bxs-plane-alt me-1"></i>Publish</a>
                                    @endif
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-circle me-1"></i> Detail</button>
                                    <a href="{{ route('admin.berita.edit',$item->id) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt me-1"></i>Edit</a>
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

{{-- Modal Detail--}}
@foreach ($berita as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning pb-3">
                <h5 class="modal-title text-white" id="modalDetailTitle">Detail Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <small>{{ $item->published_at }}</small>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Judul</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <p>{{ $item->judul }}</p>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Status</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <p>{{ $item->status }}</p>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Author</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <p>{{ $item->author }}</p>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Deskripsi</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        {!! $item->content !!}
                    </div>
                    <div class="col-sm-2 mb-3">
                        <p>Foto</p>
                    </div>
                    <div class="col-sm-10 mb-3">
                        <img class="img-thumbnail" width="200" src="{{ asset('storage/'. $item->foto) }}" alt="Foto {{ $item->judul }}" class="img-thumbnail">
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
@foreach ($berita as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            Apakah anda yakin ingin menghapus berita <strong>{{ $item->judul }}</strong> ?
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
<script src="{{ asset('temp_back/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#desc'
    });
</script>
@endpush