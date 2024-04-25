@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master Produk</h1>
</div>

<div class="row d-flex">
    <div class="col-md-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>

<div class="table-responsive small">
    <a href="/dashboard/produk/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Produk</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Qty</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($produks as $produk)    
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $produk->produk_kode }}</td>
                <td>{{ $produk->produk_nama }}</td>
                <td>{{ $produk->produk_hrg }}</td>
                <td>{{ $produk->produk_stock }}</td>
                <td>{{ $produk->kategori_relasi->kat_nama }}</td>
                <td>
                    {{-- <a href="/dashboard/contact/{{ $contact->id_contact }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> --}}
                    <a href="/dashboard/produk/{{ $produk->produk_id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="/dashboard/produk/{{ $produk->produk_id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection