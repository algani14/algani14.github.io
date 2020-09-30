<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\Type_Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Kamar::with('typekamar')->get();
        return view('kamar.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kamar =  Kamar::with(' typekamar')->select('type_kamar','lantai');
        $type=Type_Kamar::all();
        return view('kamar.create',compact('type','kamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kamar= new Kamar();
        $kamar->no_kamar=$request->no_kamar;
        $kamar->nama_kamar=$request->nama_kamar;
        $kamar->type_kamar=$request->type_kamar;
      
        $kamar->harga_kamar=$request->harga_kamar;
        $kamar->save();
        return redirect()->route('kamar.index')->with(['message'=>'Data Berhasil Di Simpan']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar.show', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar =Kamar::findOrFail($id);
        $type=Type_Kamar::all();
        return view('kamar.edit', compact('kamar','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kamar=Kamar::findOrFail($id);
        $kamar->no_kamar=$request->no_kamar;
        $kamar->nama_kamar=$request->nama_kamar;
        $kamar->type_kamar=$request->type_kamar;
        $kamar->harga_kamar=$request->harga_kamar;
        $kamar->save();
        return redirect()->route('kamar.index')->with(['message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar=Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('kamar.index')
        ->with(['succes'=>'Data Berhasil Di Hapus']);
    }
}
