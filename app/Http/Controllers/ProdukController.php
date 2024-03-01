<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // Digunakan untuk menambahkan data Produk baru
        $data = [
            'id' => 'required',
            'nama' => 'required',
            'stok' => 'required | integer',
            'harga' => 'required | integer',
            'idjenis' => 'required | integer',
        ];

        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            $fails = [
                "message" => "Gagal Menambahkan Data Produk",
                "data" => $validator->errors()
            ];
            return response()->json($fails, 404);
        } else {
            $prd = new Produk();
            $prd->id = $request->id;
            $prd->nama = $request->nama;
            $prd->stok = $request->stok;
            $prd->harga = $request->harga;
            $prd->idjenis = $request->idjenis;
            $prd->save();
            $success = [
                "message" => "Data Produk Berhasil Ditambahkan",
                "data" => $prd
            ];
            return response()->json($success, 200);
        }
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
        // Digunakan untuk mengupdate data dari Produk
        $validator = Validator::make($request->all(), [
            'id' => 'integer',
            'nama' => 'string |max:255',
            'stok' => 'integer',
            'harga' => 'integer',
            'idjenis' => 'integer',
        ]);

        if ($validator->fails()) {
            $fails = [
                'message' => 'Data Tidak Valid',
                'data' => $validator->errors()
            ];
            return response()->json($fails, 400);
        }

        $prd = Produk::find($id);
        if ($prd) {
            $prd->update($request->all());
            $success = [
                'success' => true,
                'message' => 'Data Produk Berhasil diupdate',
                'data' => $prd
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                'success' => false,
                'message' => 'Data Produk Tidak Ditemukan',
                'data' => $prd
            ];
            return response()->json($fails, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Digunakan untuk menghapus data dari Produk

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
