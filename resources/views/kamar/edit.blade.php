@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kamar</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('kamar.update',$kamar->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
							<div class="form-grup">
                                <label for="">No Kamar</label>
              
                                <input type="text" value="{{$kamar->no_kamar}}" name="no_kamar" class="form-control" required>
                            </div>
                            <div class="from-grup">
                                <label for="">Nama Kamar</label>
                        
                                <input type="text" value="{{$kamar->nama_kamar}}" name="nama_kamar" class="form-control" required>
                            </div>
                            <div class="from-grup">
                                <label for="">type kamar id</label>
							
                                <select name="type_kamar" id="" class="form-control">
                                    @foreach ($type as $item)
                                        <option value="{{$item->id}}"{{$item->id==$kamar->type_kamar ?'selected':''}}>
                                            {{$item->type_kamar}}-{{$item->lantai}}
                                        </option>
                                    @endforeach
                               </select>
                            </div>
						
							</div>
                            <div class="from-grup">
                                <label for="">Harga</label>
                        
                                <input type="text" value="{{$kamar->harga_kamar}}" name="harga_kamar" class="form-control" required>
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
