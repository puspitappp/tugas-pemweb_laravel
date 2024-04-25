@extends('dashboard.layouts.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master Order</h1>
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
    <a href="/dashboard/order/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Order</th>
                <th scope="col">Nama Kurir</th>
                <th scope="col">Ongkir</th>
                <th scope="col">Tanggal Order</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)  
            <?php
            if ($order->order_batal == 0) {
                $status = '<p class="text-warning">Draft</p>';
            }elseif ($order->order_batal == 1) {
                $status = '<p class="text-success">Ordered</p>';
            }else {
                $status = '<p class="text-danger">Canceled</p>';
            }
            ?>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->order_kode }}</td>
                <td>{{ $order->order_kurir }}</td>
                <td>{{ $order->order_ongkir }}</td>
                <td>{{ $order->order_tgl }}</td>
                <td><?= $status ?></td>
                <td>
                    {{-- <a href="/dashboard/contact/{{ $contact->id_contact }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> --}}
                    <a href="/dashboard/order/{{ $order->order_id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="/dashboard/order/{{ $order->order_id }}" method="post" class="d-inline">
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