<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);

        return view('suppliers.index', compact('suppliers'))
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
            'kode_supplier' => 'required|unique:supplier',
            'nama_supplier' => 'required|string',
            'alamat' => 'nullable',
            'no_telepon' => 'required|string|unique:supplier',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'kode_supplier' => 'required',
            'nama_supplier' => 'required|string',
            'alamat' => 'nullable',
            'no_telepon' => 'required|string',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
            ->with('updated', 'Data Supplier berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('deleted', 'Data Supplier berhasil dihapus');
    }
}
