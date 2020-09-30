@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
            <div class="card">
                <div class="card-header">Ini Halaman Booking</div>


                
                    <a href="{{route('booking.create')}} " class="btn btn-outline-primary float-right">Tambah Data</a>
                    
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>check in</th>
                            <th>nama pelanggan </th>
                            <th>nama kamar</th>
                          
                            <th>check out </th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                             $no=1   
                            @endphp
                            @foreach ($data as $item)

                                <tr> 
                                    <td>{{$no++}}</td>
                                    <td>{{$item->check_in}}</td>
                                    <td>{{$item->pelanggan->nama}}</td>
                                    <td>{{$item->kamar->nama_kamar}}</td>
                                   
                                    <th>{{$item->check_out}}</th>
                                   
                                    <td>
                                        <form action="{{route('booking.destroy',$item->id)}}" method="POST">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-warning" href="{{route('booking.show',$item->id)}}">Show</a>
                                        <a class="btn btn-outline-success" href="{{route('booking.edit',$item->id)}}">Edit</a>
                                        <button type="submit" class="btn btn-outline-danger" >Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
