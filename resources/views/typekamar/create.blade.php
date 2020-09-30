@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Type Kamar</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('typekamar.store')}}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">Masukan type</label>
                            
                                <input type="text" name="type_kamar" class="form-control" required>
                            </div>
                            <div class="form-grup">
                                <label for="">Keterangan</label>
                         
                                <textarea class ="form-control" name="keterangan" id="" cols="50" rows="10"></textarea>
                            </div>
                            <div class="form-grup">
                                <label for="">Lantai</label>
                         
                                <input type="text" name="lantai" class="form-control" required>
                            </div>
                        </div>
 
                        <br>
                         <div class="from-grup">
                                <button class="btn btn-primary" type="submit">simpan</button>
                                <button class="btn btn-primary" type="reset"    >reset</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
