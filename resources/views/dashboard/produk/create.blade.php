@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Produk</h1>
</div>

<div class="col-md-6">
    <form action="/dashboard/produk" method="post">
        @csrf
        {{-- <input type="text" name="produk_kode" value="1">
        <input type="text" name="produk_photo" value="1"> --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" name="produk_nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('produk_nama') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="number" name="produk_hrg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('produk_hrg') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Qty</label>
            <input type="number" name="produk_stock" class="form-control" id="exampleInputPassword1" required value="{{ old('produk_stock') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilih Kategori</label>
            <select class="form-control" name="kat_id" id="">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategories as $kategori)
                <option value="{{ $kategori->kat_id }}">{{ $kategori->kat_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            <textarea class="form-control" name="produk_keterangan" cols="30" rows="5">{{ old('produk_keterangan') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/dashboard/produk" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection