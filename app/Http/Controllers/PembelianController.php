<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pembelian;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelians = DB::table('pembelian')
            ->join('barang', 'pembelian.id_barang', '=', 'barang.id')
            ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
            ->select('pembelian.*', 'supplier.nama_supplier', 'barang.nama_barang', 'barang.harga_barang')
            ->get();
        $suppliers = Supplier::all();
        $barangs = Barang::all();

        return view('pembelians.index', compact('pembelians', 'suppliers', 'barangs'))
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
            'no_pembelian' => 'required|unique:Pembelian',
            'tanggal' => 'required',
            'id_supplier' => 'required',
            'id_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'created_at' => 'required',
            'created_by' => 'required',
        ]);

        $harga_total = $request->jumlah_barang * $request->harga_barang;
        $request->merge(['harga_barang' => $harga_total]);

        Pembelian::create($request->all());

        $barangs = Barang::find($request->id_barang);

        $barangs->stok_barang += $request->jumlah_barang;
        $barangs->save();

        return redirect()->route('pembelians.index')
            ->with('success', 'Pembelian Berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $Pembelian)
    {
        $request->validate([
            'no_pembelian' => 'required',
            'tanggal' => 'required|string',
            'alamat' => 'nullable',
            'no_telepon' => 'required|string',
        ]);

        $Pembelian->update($request->all());

        return redirect()->route('Pembelians.index')
            ->with('updated', 'Data Pembelian berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $Pembelian)
    {
        $Pembelian->delete();

        return redirect()->route('pembelians.index')
            ->with('deleted', 'Data Pembelian berhasil dihapus');
    }
}
