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
                <div class="card-header">Ini Halaman Kunci</div>


                
                    <a href="{{route('kunci.create')}} " class="btn btn-outline-primary float-right">Tambah Data</a>
                    
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>No kunci</th>
                            <th>Nama kamar</th>
                            <th>nama pelanggan </th>
                            <th>merk kunci</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($data as $item)

                                <tr>
                                <td>{{$no++}}</td>
                                    <td>{{$item->kamar->no_kamar}}</td>
                                    <td>{{$item->kamar->nama_kamar}}</td>
                                    <td>{{$item->pelanggan->nama}}</td>
                                    <td>{{$item->merk_kunci}}</td>
                                    
                                    <td>
                                        <form action="{{route('kunci.destroy',$item->id)}}" method="POST">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-warning" href="{{route('kunci.show',$item->id)}}">Show</a>
                                        <a class="btn btn-outline-success" href="{{route('kunci.edit',$item->id)}}">Edit</a>
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
