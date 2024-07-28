@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    {{-- <a href="{{ route('admin.ppdb.create') }}" class="btn btn-primary"><i class="bx bx-info-circle me-1"></i>Tambah Program Keahlian</a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="table" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Email</th>
                                <th class="text-center">Pas Foto</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($ppdb as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <img src="{{ asset('storage/'. $item->pas_foto) }}" alt="Foto {{ $item->nama }}" class="img-thumbnail w-50">
                                </td>
                                <td>{{ $item->jurusan }}</td>
                                <td>
                                    <span class="badge @if ($item->status == 'menunggu')
                                        bg-primary
                                    @elseif ($item->status == 'diterima')
                                        bg-success
                                    @elseif ($item->status == 'ditolak')
                                        bg-danger
                                    @endif">{{ $item->status }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-circle"></i> Detail</button>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalStatus{{ $item->id }}"><i class="bx bx-pen"></i> Status</button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash"></i> Hapus</button>
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
{{-- Modal Delete --}}
@foreach ($ppdb as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.ppdb.delete', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            Apakah anda yakin ingin menghapus data Program Keahlian <strong>{{ $item->nama_program }}</strong> ?
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

{{-- Modal Status --}}
@foreach ($ppdb as $item)
<div class="modal fade" id="modalStatus{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white pb-3" id="modalDeleteTitle">Hapus Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.ppdb.status', $item->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="" class="form-label">Ubah Status Pendaftar</label>
                            <select class="form-select form-select-lg" name="status" id="" required>
                                <option value="" hidden>--Pilih Status--</option>
                                @foreach ($status as $s)
                                <option class="text-capitalize" value="{{ $s }}">{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-warning"><i class="bx bx-pen"></i> Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Detail--}}
{{-- @foreach ($ppdb as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-modal="true">
<div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info pb-3">
            <h5 class="modal-title text-white" id="modalDetailTitle">Detail Pendaftaran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <img class="img-thumbnail mx-auto shadow" width="200" src="{{ asset('storage/'. $item->pas_foto) }}" alt="Foto {{ $item->nama }}" class="img-thumbnail">
                </div>
                <div class="col-12">
                    <div class="table-responsive text-nowrap">
                        <table id="table" class="table table-hover">
                            <tbody>
                                <tr>
                                    <td class="bg-info text-white">Status</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $item->status }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white">Jurusan</td>
                                    <td>
                                        <span class="badge bg-dark">{{ $item->jurusan }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white">Nama</td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white text-capitalize">email</td>
                                    <td>{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white text-capitalize">nisn</td>
                                    <td>{{ $item->nisn }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white text-capitalize">Jenis kelamin</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white">TTL</td>
                                    <td>{{ $item->tempat_lahir }}, {{ date('d F Y', strtotime($item->tanggal_lahir)); }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white">Alamat</td>
                                    <td>{{ $item->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white text-capitalize">no telp / WA</td>
                                    <td>{{ $item->no_telp }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-info text-white text-capitalize">Asal Sekolah</td>
                                    <td>{{ $item->asal_sekolah }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-dark text-white text-capitalize">Nama Ayah</td>
                                    <td>{{ $item->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-dark text-white text-capitalize">pekerjaan Ayah</td>
                                    <td>{{ $item->pekerjaan_ayah }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-dark text-white text-capitalize">nama ibu</td>
                                    <td>{{ $item->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-dark text-white text-capitalize">pekerjaan ibu</td>
                                    <td>{{ $item->pekerjaan_ibu }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-dark text-white text-capitalize">No Telp Ortu</td>
                                    <td>{{ $item->no_telp_ortu }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-dark text-white text-capitalize">penghasilan ortu</td>
                                    <td>{{ $item->penghasilan_ortu }}</td>
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
@endforeach --}}
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function(){
        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-primary',
                        exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    }
                },
            ],
            responsive: true,
        });
    });
</script>

@endpush