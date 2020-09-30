@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('typekamar.update',$type->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">Masukan Type Kamar</label>   
                                <input type="text" name="type_kamar" value="{{$type->type_kamar}}" class="form-control" required>
                            </div>
                            <div class="table-responsive">
                                <div class="form-grup">
                                    <label for="">Keterangan</label>   
                                    <input type="text" name="keterangan" value="{{$type->keterangan}}" class="form-control" required>
                                </div>
                                <div class="form-grup">
                                    <label for="">Lantai</label>
                             
                                    <input type="text" name="lantai" value="{{$type->lantai}}" class="form-control" required>
                                </div>
           
                        </div>
                        <br>
                         <div class="from-grup">
                                <button class="btn btn-primary" type="submit">simpan</button>
                                <button class="btn btn-primary" type="reset">reset</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
