@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Produk</h1>
</div>

<div class="col-md-6">
    <form action="/dashboard/order" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Kurir</label>
            <input type="text" name="order_kurir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('order_kurir') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ongkir</label>
            <input type="number" name="order_ongkir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="{{ old('order_ongkir') }}">
        </div>
        <hr class="my-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
            <select class="form-control" name="produk_kode" id="">
                <option value="">-- Pilih Produk --</option>
                @foreach($produks as $produk)
                <option value="{{ $produk->produk_kode }}">{{ $produk->produk_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="number" name="detail_harga" class="form-control" id="exampleInputPassword1" required value="{{ old('detail_harga') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Qty</label>
            <div class="input-group mb-3">
                <input type="number" name="detail_jml" class="form-control" id="exampleInputPassword1" required value="{{ old('detail_jml') }}">
                <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
        <a href="/dashboard/order" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection