@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Pelanggan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">No Kamar</label>
              
                                <input type="text" value="{{$pelanggan->nama}}" name="" class="form-control" readonly>
                            </div>
                            <div class="from-grup">
                                <label for="">Nama Kamar</label>
                        
                                <input type="text" value="{{$pelanggan->email}}" name="" class="form-control" readonly>
                            </div>
                            <div class="from-grup">
                                <label for="">type kamar id</label>
                        
                                <input type="text" value="{{$pelanggan->no_telp}}" name="" class="form-control" readonly>
                            </div>
                            <div class="from-grup">
                                <label for="">alamat</label>
                        
                                <input type="text" value="{{$pelanggan->alamat}}" name="" class="form-control" readonly>
                            </div>
                            <div class="form-grup">
                                <label for="">Nama Kamar</label>
                                @foreach ($pelanggan->kamar as $item)
                                    <ul><li>{{$item->nama_kamar}}</li></ul>
                                @endforeach
                            </div>
                            <br>
                            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Kembali</a>
                        </div>
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
