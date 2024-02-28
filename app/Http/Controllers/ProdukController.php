<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Digunakan untuk menampilkan data dari API
        $prd = Produk::all();
        if (isset($prd)) {
            $hasil = [
                "message" => "Data Produk Tersedia",
                "data" => $prd
            ];
            return response()->json($hasil, 200);
        } else {
            $fails = [
                "message" => "Data Produk Tidak Ditemukan",
                "data" => $prd
            ];
            return response()->json($fails, 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Digunakan untuk menghapus data dari API
        $prd = Produk::find($id);
        if (isset($prd)) {
            $prd->delete();
            $success = [
                "message" => "Data Produk Berhasil",
                "data" => $prd
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                "message" => "Data Produk Tidak Ditemukan",
                "data" => $prd
            ];
            return response()->json($fails, 404);
        }
    }
}
