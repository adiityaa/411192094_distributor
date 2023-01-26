<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pelanggan;
use App\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualans = DB::table('penjualan')
            ->join('barang', 'penjualan.id_barang', '=', 'barang.id')
            ->join('pelanggan', 'penjualan.id_pelanggan', '=', 'pelanggan.id')
            ->select('penjualan.*', 'pelanggan.nama_pelanggan', 'barang.nama_barang', 'barang.harga_barang')
            ->get();
        $pelanggans = Pelanggan::all();
        $barangs = Barang::all();

        return view('penjualans.index', compact('penjualans', 'pelanggans', 'barangs'))
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
        $barangs = Barang::find($request->id_barang);

        if ($barangs->stok_barang < $request->jumlah_barang) {
            return redirect()->route('penjualans.index')
                ->with('error', 'Penjualan gagal. Jumlah barang yang ditambahkan melebihi dari stok yang tersedia!');
        } else {
            $request->validate([
                'no_penjualan' => 'required|unique:Penjualan',
                'tanggal' => 'required',
                'id_pelanggan' => 'required',
                'id_barang' => 'required',
                'jumlah_barang' => 'required',
                'harga_barang' => 'required',
                'created_at' => 'required',
                'created_by' => 'required',
            ]);

            $harga_total = $request->jumlah_barang * $request->harga_barang;
            $request->merge(['harga_barang' => $harga_total]);

            $barangs->stok_barang -= $request->jumlah_barang;
            $barangs->save();


            Penjualan::create($request->all());

            return redirect()->route('penjualans.index')
                ->with('success', 'Penjualan Berhasil ditambahkan.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $Penjualan)
    {
        $request->validate([
            'kode_penjualan' => 'required',
            'nama_penjualan' => 'required|string',
            'alamat' => 'nullable',
            'no_telepon' => 'required|string',
        ]);

        $Penjualan->update($request->all());

        return redirect()->route('penjualans.index')
            ->with('updated', 'Data Penjualan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $Penjualan)
    {
        $Penjualan->delete();

        return redirect()->route('penjualans.index')
            ->with('deleted', 'Data Penjualan berhasil dihapus');
    }
}
