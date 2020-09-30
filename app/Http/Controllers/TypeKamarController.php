<?php

namespace App\Http\Controllers;

use App\Type_Kamar;
use Illuminate\Http\Request;

class TypeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Type_Kamar::all();
        return view('typekamar.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=Type_Kamar::all();
        return view('typekamar.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type= new Type_Kamar;
        $type->type_kamar=$request->type_kamar;
        $type->keterangan=$request->keterangan;
        $type->lantai=$request->lantai;
        $type->save();
        return redirect()->route('typekamar.index')->with(['message'=>'Data hobi Berhasil Di Simpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_Kamar  $type_Kamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type_Kamar::findOrFail($id);
        return view('typekamar.show', compact('type'));              
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_Kamar  $type_Kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type=Type_Kamar::findOrFail($id);
        return view('typekamar.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_Kamar  $type_Kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type=Type_Kamar::findOrFail($id);
        $type->type_kamar=$request->type_kamar;
        $type->keterangan=$request->keterangan;
        $type->lantai=$request->lantai;
        $type->save();
        return redirect()->route('typekamar.index')->with(['message'=>'Data  Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_Kamar  $type_Kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type=Type_Kamar::findOrFail($id);
        $type->delete();
        return redirect()->route('typekamar.index')
        ->with(['succes'=>'Data Berhasil Di Hapus']);
    }
}
