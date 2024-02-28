<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Digunakan untuk menampilkan data dari API
        $jpr = JenisProduk::all();
        if (isset($jpr)) {
            $hasil = [
                "message" => "Data JenisProduk Tersedia",
                "data" => $jpr
            ];
            return response()->json($hasil, 200);
        } else {
            $fails = [
                "message" => "Data JenisProduk Tidak Ditemukan",
                "data" => $jpr
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
        $jpr = JenisProduk::find($id);
        if (isset($jpr)) {
            $jpr->delete();
            $success = [
                "message" => "Data JenisProduk Berhasil",
                "data" => $jpr
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                "message" => "Data JenisProduk Tidak Ditemukan",
                "data" => $jpr
            ];
            return response()->json($fails, 404);
        }
    }
}
