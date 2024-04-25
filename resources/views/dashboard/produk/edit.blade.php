@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Contact</h1>
</div>

<div class="col-md-6">
    <form action="/dashboard/produk/{{ $produk->produk_id }}" method="post">
        @method('put')
        @csrf
        {{-- <input type="text" name="users_id" value="{{ old('firstname', $contact->users_id) }}" readonly> --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" name="produk_nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('produk_nama', $produk->produk_nama) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="number" name="produk_hrg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('produk_hrg', $produk->produk_hrg) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Qty</label>
            <input type="number" name="produk_stock" class="form-control" id="exampleInputPassword1" required value="{{ old('produk_stock', $produk->produk_stock) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilih Kategori</label>
            <select class="form-control" name="kat_id" id="">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategories as $kategori)
                <option value="{{ $kategori->kat_id }}" <?php if($produk->kat_id == $kategori->kat_id){ echo 'selected'; } ?>>{{ $kategori->kat_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            <textarea class="form-control" name="produk_keterangan" cols="30" rows="5">{{ old('produk_keterangan', $produk->produk_keterangan) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/dashboard/produk" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection