@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show  Booking</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">cek in</label>
              
                                <input type="text" value="{{$booking->check_in}}" name="" class="form-control" readonly>
                            </div>
                            <div class="from-grup">
                                <label for="">Nama Pelanggan</label>
                        
                                <input type="text" value="{{$booking->pelanggan->nama}}" name="" class="form-control" readonly>
                            </div>
                            <div class="from-grup">
                                <label for="">Kamar</label>
                        
                                <input type="text" value="{{$booking->kamar->nama_kamar}}" name="" class="form-control" readonly>
                            </div>
                            <div class="from-grup">
                                <label for="">cek out</label>
                        
                                <input type="text" value="{{$booking->check_out}}" name="" class="form-control" readonly>
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
