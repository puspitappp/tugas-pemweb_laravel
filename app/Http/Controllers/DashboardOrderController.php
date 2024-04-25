<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.order.index', [
            'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.order.create', [
            'produks' => Produk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'order_kurir' => 'required',
            'order_ongkir' => 'required'
        ]);

        $auto_kode = $this->generate_order();

        $validate['order_batal'] = 0;
        $validate['order_kode'] = $auto_kode;

        $validate2 = $request->validate([
            'produk_kode' => 'required',
            'detail_harga' => 'required',
            'detail_jml' => 'required'
        ]);
        $validate2['order_kode'] = $auto_kode;

        Order::create($validate);
        OrderDetail::create($validate2);
        return redirect('/dashboard/order/')->with('success', 'Data berhasil ditambahkan!');
    }

    public function generate_order()
    {
        $kode_faktur = DB::table('tb_order')->max('order_kode');

        if ($kode_faktur) {
            $nilai = substr($kode_faktur, 5);
            $kode = (int) $nilai;

            //tambahkan sebanyak + 1
            $kode = $kode + 1;
            $auto_kode = "ORD-" . str_pad($kode, 6, "0", STR_PAD_LEFT);
        } else {
            $auto_kode = "ORD-000001";
        }
        return $auto_kode;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, OrderDetail $orderDetail)
    {
        // $code = $order['order_kode'];
        // $kode_faktur = DB::table('tb_order');
        // $produks = Produk::all();
        // foreach ($produks as $produk){
        //     return $produk->produk_kode;
        // }
        // return $produk->produk_kode;

        return view('dashboard.order.edit', [
            'order' => $order,
            'produks' => Produk::all(),
            'orderDs' => OrderDetail::where('order_kode', $order->order_kode)->join('tb_produk', 'tb_order_detail.produk_kode', '=', 'tb_produk.produk_kode')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if ($request['save'] == 1) {
            // return 'tambah';
            $validate = $request->validate([
                'order_kode' => 'required',
                'produk_kode' => 'required',
                'detail_harga' => 'required',
                'detail_jml' => 'required'
            ]);
            OrderDetail::create($validate);
            return redirect('/dashboard/order/'. $order->order_id .'/edit');
        }elseif ($request['save'] == 2){
            $validate = $request->validate([
                'order_kurir' => 'required',
                'order_ongkir' => 'required'
            ]);
            $validate['order_batal'] = 1;
            Order::where('order_id', $order->order_id)->update($validate);
            return redirect('/dashboard/order/')->with('success', 'Data berhasil diorder!');
        }else {
            $validate['order_batal'] = 2;
            Order::where('order_id', $order->order_id)->update($validate);
            return redirect('/dashboard/order/')->with('success', 'Order Dibatalkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // return $order;
        Order::destroy($order->order_id);
        OrderDetail::where('order_kode', $order->order_kode)->delete();
        return redirect('/dashboard/order')->with('success', 'Data berhasil dihapus!');
    }
}
