@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Kategori</h1>
</div>

<div class="col-md-6">
    <form action="/dashboard/kategori/{{ $kategori->kat_id }}" method="post">
        @method('put')
        @csrf
        {{-- <input type="text" name="users_id" value="{{ old('firstname', $contact->users_id) }}" readonly> --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" name="kat_nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('kat_nama', $kategori->kat_nama) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            <textarea class="form-control" name="kat_keterangan" cols="30" rows="5">{{ old('kat_keterangan', $kategori->kat_keterangan) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/dashboard/kategori" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection