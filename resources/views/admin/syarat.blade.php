@extends('admin.layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.syarat-ppdb.update',$syarat->id) }}">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="content" class="form-label">Status PPDB</label>
                            <br>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <input type="radio" class="btn-check" name="status" value="dibuka" id="dibuka" {{ $syarat->status == 'dibuka' ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary text-capitalize" for="dibuka">Dibuka</label>

                                <input type="radio" class="btn-check" name="status" value="ditutup" id="ditutup" {{ $syarat->status == 'ditutup' ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary text-capitalize" for="ditutup">Ditutup</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="content" class="form-label">Syarat PPDB</label>
                            <textarea class="form-control" name="content" id="desc" rows="5">{{ $syarat->content }}</textarea>
                        </div>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-warning"><i class="bx bx-save"></i> Edit Data</button>

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