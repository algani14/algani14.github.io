@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show  Type Kamar</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">No Kamar</label>
              
                                <input type="text" value="{{$type->type_kamar}}" name="" class="form-control" readonly>
                            </div>
                            <div class="from-grup">
                                <label for="">Nama Kamar</label>
                        
                                <input type="text" value="{{$type->keterangan}}" name="" class="form-control" readonly>
                            </div>
                            <div class="form-grup">
                                <label for="">Lantai</label>
                         
                                <input type="text" name="lantai" value="lantai" class="form-control" readonly>
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
