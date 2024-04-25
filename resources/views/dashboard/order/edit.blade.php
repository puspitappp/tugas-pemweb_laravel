@extends('dashboard.layouts.main')

<?php
    $readonly = "";
    if ($order->order_batal != 0) {
        $readonly = "readonly";
    }
?>

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Order</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="/dashboard/order/{{ $order->order_id }}" method="post">
            @method('put')
            @csrf
            <input type="hidden" name="order_kode" value="{{ old('order_kode', $order->order_kode) }}" readonly>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Kurir</label>
                <input type="text" name="order_kurir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" {{ $readonly }} required value="{{ old('order_kurir', $order->order_kurir) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ongkir</label>
                <input type="number" name="order_ongkir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" {{ $readonly }} required value="{{ old('order_ongkir', $order->order_ongkir) }}">
            </div>
            @if ($order->order_batal == 0)
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
                    <input type="number" name="detail_harga" class="form-control" id="exampleInputPassword1" value="{{ old('detail_harga') }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Qty</label>
                    <div class="input-group mb-3">
                        <input type="number" name="detail_jml" class="form-control" id="exampleInputPassword1" value="{{ old('detail_jml') }}">
                        <button type="submit" name="save" value="1" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
                    </div>
                </div>
                <button type="submit" name="save" value="2" class="btn btn-primary">Save</button>
            @elseif ($order->order_batal == 1)
                <button type="submit" name="save" value="3" class="btn btn-danger">Batal</button>
            @endif
            <a href="/dashboard/order" class="btn btn-danger">Back</a>
        </form>
    </div>
    <div class="col-md-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDs as $orderD)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $orderD->produk_kode }}</td>
                    <td>{{ $orderD->produk_nama }}</td>
                    <td>{{ $orderD->detail_harga }}</td>
                    <td>{{ $orderD->detail_jml }}</td>
                    <td>{{ $orderD->detail_harga * $orderD->detail_jml }}</td>
                    @if ($order->order_batal == 0)
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection