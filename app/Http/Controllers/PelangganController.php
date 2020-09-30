<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Kamar;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan=Pelanggan::all();
        $kamar=Kamar::all();

        return view('pelanggan.index',compact('pelanggan','kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan=Pelanggan::all();
        $kamar=Kamar::all();
        return view('pelanggan.create',compact('pelanggan','kamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelanggan=new pelanggan();
        $pelanggan->nama=$request->nama;
        $pelanggan->email=$request->email;
        $pelanggan->no_telp=$request->no_telp;
        $pelanggan->alamat=$request->alamat;
        $pelanggan->save();
        $pelanggan->kamar()->attach($request->nama_kamar);
        return redirect()->route('pelanggan.index')->with(['message'=>'Data  Berhasil Di Simpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $pelanggan=Pelanggan::findOrFail($id);
        $select= $pelanggan->kamar->pluck('id')->toArray();
        return view('pelanggan.show',compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan=Pelanggan::findOrFail($id);
        $kamar=Kamar::all();
        $select= $pelanggan->kamar->pluck('id')->toArray();
        return view('pelanggan.edit',compact('pelanggan','kamar' ,'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan=Pelanggan::findOrFail($id);
        $pelanggan->nama=$request->nama;
        $pelanggan->email=$request->email;
        $pelanggan->no_telp=$request->no_telp;
        $pelanggan->alamat=$request->alamat;
        $pelanggan->save();
        $pelanggan->kamar()->sync($request->nama_kamar);
        return redirect()->route('pelanggan.index')->with(['message'=>'Data  Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan=Pelanggan::findOrFail($id);
        $pelanggan->kamar()->detach($pelanggan->nama_kamar);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with(['message'=>'Data  Berhasil Di Hapus']);
    }
    
}
