<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::select('barang.*', DB::raw('sum(penjualan.jumlah_barang) as penjualan_barang'), DB::raw('sum(pembelian.jumlah_barang) as pembelian_barang'))
            ->leftJoin('pembelian', 'pembelian.id_barang', '=', 'barang.id')
            ->leftJoin('penjualan', 'penjualan.id_barang', '=', 'barang.id')
            ->groupBy('barang.id')
            ->get();

        return view('barangs.index', compact('barangs'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'nullable|string',
            'stok_barang' => 'nullable|integer',
            'harga_barang' => 'nullable|integer',
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'nullable|string',
            'stok_barang' => 'nullable|integer',
            'harga_barang' => 'nullable|integer',
        ]);

        $barang->update($request->all());

        return redirect()->route('barangs.index')
            ->with('updated', 'Data Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')
            ->with('deleted', 'Data Barang berhasil dihapus');
    }
}
