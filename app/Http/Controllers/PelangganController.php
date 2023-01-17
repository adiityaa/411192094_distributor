<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::paginate(10);

        return view('pelanggans.index', compact('pelanggans'))
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
            'kode_pelanggan' => 'required|unique:pelanggan',
            'nama_pelanggan' => 'required|string',
            'alamat' => 'nullable',
            'no_telepon' => 'required|string|unique:pelanggan',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggans.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'kode_pelanggan' => 'required',
            'nama_pelanggan' => 'required|string',
            'alamat' => 'nullable',
            'no_telepon' => 'required|string',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggans.index')
            ->with('updated', 'Data Pelanggan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggans.index')
            ->with('deleted', 'Data Pelanggan berhasil dihapus');
    }
}
