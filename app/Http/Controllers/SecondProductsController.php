<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecondProducts;
use Illuminate\Support\Facades\Auth;

class SecondProductsController extends Controller
{
    public function index() {
        $data = SecondProducts::all()->toArray();
        return response()->json([
            "results" => array_reverse($data)
        ]);
    }

    public function store(Request $request) {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $gambar = time() . "-" . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('produk-img'), $gambar);

            $produk = new SecondProducts([
                "nama" => $request['nama'],
                "harga" => $request['harga'],
                "gambar" => "/produk-img/" . $gambar,
                "detail" => $request['detail']
            ]);

            $produk->save();

            return response()->json([
                "message" => "berhasil menambahkan produk"
            ]);
        }
    }

    public function update(Request $request) {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $produk = SecondProducts::find($request['id']);
            $produk->update([
                "nama" => $request['nama'],
                "harga" => $request['harga'],
                "detail" => $request['detail']
            ]);

            $produk->save();

            return response()->json([
                "message" => "berhasil mengedit produk"
            ]);
        }
    }

    public function destroy(Request $request) {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $produk = SecondProducts::find($request['id']);
            unlink(public_path($produk->gambar));
            $produk->delete();
            return response()->json([
                "message" => "berhasil menghapus produk"
            ]);
        }
    }
}
