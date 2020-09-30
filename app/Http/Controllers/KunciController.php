<?php

namespace App\Http\Controllers;
use App\Kamar;
use App\Kunci;
use App\Pelanggan;
use Illuminate\Http\Request;

class KunciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Kunci::with('kamar','pelanggan')->get();
        return view('kunci.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kunci =  Kunci::with('pelanggan','kamar')->select('nama','no_kamar','nama_kamar');
        $kamar=Kamar::all();
        $pelanggan=Pelanggan::all();
        return view('kunci.create',compact('kunci','kamar','pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kunci= new Kunci();
        $kunci->kamar_id=$request->kamar_id;
        $kunci->pelanggan_id=$request->pelanggan_id;
        $kunci->merk_kunci=$request->merk_kunci;
        $kunci->save();
        return redirect()->route('kunci.index')->with(['message'=>'Data Berhasil Di Simpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kunci  $kunci
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kunci=Kunci::findOrFail($id);
        return view('kunci.show',compact('kunci'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kunci  $kunci
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kunci=Kunci::findOrFail($id);
        $kamar=Kamar::all();
        $pelanggan=Pelanggan::all();
        return view('kunci.edit',compact('kunci','kamar','pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kunci  $kunci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kunci=Kunci::findOrFail($id);
        $kunci->pelanggan_id=$request->pelanggan_id;
        $kunci->kamar_id=$request->kamar_id;
        $kunci->merk_kunci=$request->merk_kunci;
        $kunci->save();
        return redirect()->route('kunci.index')->with(['message'=>'Data Berhasil Di Update']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kunci  $kunci
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kunci=Kunci::findOrFail($id);
        $kunci->delete();
        return redirect()->route('kunci.index')
        ->with(['succes'=>'Data Berhasil Di Hapus']);
    }
}
