<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiskonProducts;

class DiskonProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DiskonProducts::all()->toArray();
        return response()->json([
             "results" => array_reverse($produk) 
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
                'message' => 'permission denied!'
            ]);
        } else {
            $gambar = time() . "-" . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('produk-img'), $gambar);

            $produk = new DiskonProducts([
                'nama'=>$request['nama'],
                "harga_asli"=>$request['harga_asli'],
                'harga_diskon'=>$request['harga_diskon'],
                'gambar'=> '/produk-img/' . $gambar,
                'detail'=>$request['detail'],
                'keterangan'=>$request['keterangan'],
            ]);

            $produk->save();

            return response()->json([
                'message' => 'berhasil menambahkan produk'
            ]);
        }
    }

  

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
                'message' => 'permission denied!'
            ]);
        } else {
            $produk = DiskonProducts::find($request['id']);
            $produk->update([
                'nama' => $request['nama'],
                "harga_asli" => $request['harga_asli'],
                'harga_diskon' => $request['harga_diskon'],
                'detail' => $request['detail'],
                'keterangan' => $request['keterangan'],
            ]);

            $produk->save();

            return response()->json([
                'message' => 'berhasil mengedit produk'
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
                'message' => 'permission denied!'
            ]);
        } else {
            $produk = DiskonProducts::find($request['id']);
            unlink(public_path($produk->gambar));
            $produk->delete();
            return response()->json([
                'message' => 'Berhasil menghapus produk'
            ]);
        }
    }
}
