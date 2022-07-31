<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{

    public function index() {
        $data = Brands::all()->toArray();
        return response()->json([
            "results" => array_reverse($data)
        ]);
    }

    public function store(Request $request)
    {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $gambar = time() . "-" . $request->file("gambar")->getClientOriginalName();
            $request->file("gambar")->move(public_path("produk-brand"), $gambar);
            $produkBaru = new Brands([
                "nama" => $request['nama'],
                "gambar" => "/produk-brand/" . $gambar
            ]);
            $produkBaru->save();
            return response()->json([
                "message" => "Berhasil menambahkan data"
            ]);
        }
    }

    public function update(Request $request)
    {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $brand = Brands::find($request['id']);
            $brand->update([
                "nama" => $request['nama'],
            ]);
            $brand->save();
            return response()->json([
                "message" => "Berhasil menambahkan data"
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $brand = Brands::find($request['id']);
            unlink(public_path($brand->gambar));
            $brand->delete();
            return response()->json([
                "message" => "Berhasil menghapus brand"
            ]);
        }
    }
}
