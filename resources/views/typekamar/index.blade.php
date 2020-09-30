@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
            <div class="card">
                <div class="card-header">Ini Halaman typekamar
                
                    <a href="{{route('typekamar.create')}} " class="btn btn-outline-primary float-right">Tambah typekamar</a>
                </div>
                    <table class="table">
                        <thead>
                            <th>type kamar</th>
                            <th>keterangan</th>
                            <th>Lantai</th>
                          
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)

                                <tr>
                                    <td>{{$item->type_kamar}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>{{$item->lantai}}</td>
                                   
                                    <td>
                                        <form action="{{route('typekamar.destroy',$item->id)}}" method="POST">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-warning" href="{{route('typekamar.show',$item->id)}}">Show</a>
                                        <a class="btn btn-outline-success" href="{{route('typekamar.edit',$item->id)}}">Edit</a>
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
