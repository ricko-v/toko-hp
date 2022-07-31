<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewProducts;
use Illuminate\Support\Facades\Auth;

class NewProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NewProducts::all()->toArray();
        return response()->json([
            "results" => array_reverse($data)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $gambar = time() . "-" . $request->file("gambar")->getClientOriginalName();
            $request->file("gambar")->move(public_path("produk-img"), $gambar);
            $produkBaru = new NewProducts([
                "nama" => $request['nama'],
                "harga" => $request['harga'],
                "detail" => $request['detail'],
                "gambar" => "/produk-img/" . $gambar
            ]);
            $produkBaru->save();
            return response()->json([
                "message" => "Berhasil menambahkan data"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $produk = NewProducts::find($request['id']);
            $produk->update([
                "nama" => $request['nama'],
                "harga" => $request['harga'],
                "detail" => $request['detail']
            ]);

            return response()->json([
                "message" => "Berhasil mengupdate produk"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $check = auth()->user();

        if(!$check) {
            return response()->json([
                "message" => "permission denied!"
            ]);
        } else {
            $produk = NewProducts::find($request['id']);
            unlink(public_path($produk->gambar));
            $produk->delete();
            return response()->json([
                "message" => "Berhasil menghapus produk"
            ]);
        }
    }
}
