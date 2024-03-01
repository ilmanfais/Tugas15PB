<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // Digunakan untuk menambahkan data JenisProduk baru
        $data = [
            'id' => 'required',
            'nama' => 'required',
        ];

        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            $fails = [
                "message" => "Gagal Menambahkan Data JenisProduk",
                "data" => $validator->errors()
            ];
            return response()->json($fails, 404);
        } else {
            $jpr = new JenisProduk();
            $jpr->id = $request->id;
            $jpr->nama = $request->nama;
            $jpr->save();
            $success = [
                "message" => "Data JenisProduk Berhasil",
                "data" => $jpr
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
        // Digunakan untuk mengupdate data JenisProduk
        $validator = Validator::make($request->all(), [
            'id' => 'integer',
            'nama' => 'string |max:255',
        ]);

        if ($validator->fails()) {
            $fails = [
                'message' => 'Data Tidak Valid',
                'data' => $validator->errors()
            ];
            return response()->json($fails, 400);
        }

        $jpr = JenisProduk::find($id);
        if ($jpr) {
            $jpr->update($request->all());
            $success = [
                'success' => true,
                "message" => "Data JenisProduk Berhasil Diupdate",
                "data" => $jpr
            ];
            return response()->json($success, 200);
        } else {
            $fails = [
                'success' => false,
                "message" => "Data JenisProduk Tidak Ditemukan",
                "data" => $jpr
            ];
            return response()->json($fails, 404);
        }
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
