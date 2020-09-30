@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
            <div class="card">
                <div class="card-header">Ini Halaman pelanggan</div>


                
                    <a href="{{route('pelanggan.create')}} " class="btn btn-outline-primary float-right">Tambah Pelanggan</a>
                    
                    <table class="table">
                        <thead>
                            <th>Nama</th>
                            <th>email</th>
                            <th>no telepon</th>
                            <th>alamat </th>
                            <th>Nama Kamar</th>
                            
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $item)

                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->no_telp}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>
                                    @foreach ($item->kamar as $tai)
                                    <ul><li>{{$tai->nama_kamar}}</li></ul>
                                    @endforeach
                                   </td>
                                    <td>
                                        <form action="{{route('pelanggan.destroy',$item->id)}}" method="POST">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-warning" href="{{route('pelanggan.show',$item->id)}}">Show</a>
                                        <a class="btn btn-outline-success" href="{{route('pelanggan.edit',$item->id)}}">Edit</a>
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
