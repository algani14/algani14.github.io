<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Kamar;
use App\Pelanggan;
use App\Type_Kamar;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $data=Booking::with('kamar','typekamar')->get();
        $typekamar=Type_kamar::all();
        return view('booking.index',compact('data','typekamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking =  Booking::with('pelanggan','kamar','typekamar')->select('nama','nama_kamar','lantai');
        $kamar=Kamar::all();
        $pelanggan=Pelanggan::all();
        $typekamar=Type_kamar::all();
        return view('booking.create',compact('booking','kamar','pelanggan','typekamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking= new Booking();
        $booking->check_in=$request->check_in;
        $booking->pelanggan_id=$request->pelanggan_id;
        $booking->kamar_id=$request->kamar_id;
        $booking->check_out=$request->check_out;
        $booking->save();
        return redirect()->route('booking.index')->with(['message'=>'Data Berhasil Di Simpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking=Booking::findOrFail($id);
        return view('booking.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking=Booking::findOrFail($id);
        $kamar=Kamar::all();
        $pelanggan=Pelanggan::all();
        return view('booking.edit',compact('booking','kamar','pelanggan'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking=Booking::findOrFail($id);
        $booking->check_in=$request->check_in;
        $booking->pelanggan_id=$request->pelanggan_id;
        $booking->kamar_id=$request->kamar_id;
        $booking->check_out=$request->check_out;
        $booking->save();
        return redirect()->route('booking.index')->with(['message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking=Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('booking.index')
        ->with(['succes'=>'Data Berhasil Di Hapus']);
    }
}
