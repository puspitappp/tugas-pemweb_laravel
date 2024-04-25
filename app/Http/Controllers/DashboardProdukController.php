<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produk.index', [
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produk.create', [
            'kategories' => Kategori::all(),
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
            'produk_nama' => 'required',
            'produk_hrg' => 'required',
            'produk_keterangan' => 'required',
            'produk_stock' => 'required',
            'kat_id' => 'required'
        ]);

        $auto_kode = $this->generate_produk();

        $validate['produk_kode'] = $auto_kode;

        Produk::create($validate);
        return redirect('/dashboard/produk')->with('success', 'Data berhasil ditambahkan!');
    }

    public function generate_produk()
    {
        $kode_faktur = DB::table('tb_produk')->max('produk_kode');

        if ($kode_faktur) {
            $nilai = substr($kode_faktur, 5);
            $kode = (int) $nilai;

            //tambahkan sebanyak + 1
            $kode = $kode + 1;
            $auto_kode = "PRO-" . str_pad($kode, 6, "0", STR_PAD_LEFT);
        } else {
            $auto_kode = "PRO-000001";
        }
        return $auto_kode;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit', [
            'produk' => $produk,
            'kategories' => Kategori::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validate = $request->validate([
            'produk_nama' => 'required',
            'produk_hrg' => 'required',
            'produk_keterangan' => 'required',
            'produk_stock' => 'required',
            'kat_id' => 'required'
        ]);

        Produk::where('produk_id', $produk->produk_id)->update($validate);
        return redirect('/dashboard/produk')->with('success', 'Ubah data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->produk_id);
        return redirect('/dashboard/produk')->with('success', 'Data berhasil dihapus!');
    }
}
