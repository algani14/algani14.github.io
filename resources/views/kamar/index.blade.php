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
                <div class="card-header">Ini Halaman kamar</div>


                
                    <a href="{{route('kamar.create')}} " class="btn btn-outline-primary float-right">Tambah Kamar</a>
                    
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>No Kamar</th>
                            <th>Nama Kamar</th>
                            <th>Type Kamar </th>
                            <th>Lantai</th>
                            <th>Harga </th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($data as $item)

                                <tr>
                                <td>{{$no++}}</td>
                                    <td>{{$item->no_kamar}}</td>
                                    <td>{{$item->nama_kamar}}</td>
                                    <td>{{$item->typekamar->type_kamar}}</td>
                                    <td>{{$item->typekamar->lantai}}</td>
                                    <th>{{$item->harga_kamar}}</th>
                                    <td>
                                        <form action="{{route('kamar.destroy',$item->id)}}" method="POST">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-warning" href="{{route('kamar.show',$item->id)}}">Show</a>
                                        <a class="btn btn-outline-success" href="{{route('kamar.edit',$item->id)}}">Edit</a>
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
