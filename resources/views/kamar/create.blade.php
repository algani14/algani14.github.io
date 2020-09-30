@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kamar</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('kamar.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">Masukan No Kamar</label>
                            
                                <input type="text" name="no_kamar" class="form-control" required>
                            </div>
                            <div class="form-grup">
                                <label for="">Masukan Nama Kamar</label>
                         
                                <input type="text" name="nama_kamar" class="form-control" required>
                            </div>

                            <div class="form-grup">
                            <label for="">Pilih type kamar</label>
                               <select name="type_kamar"  class="form-control pilih-type_kamar" name="type_kamar[]">
                                   @foreach ($type as $item)
                                     <option value="{{$item->id}}">{{$item->type_kamar}}-{{$item->lantai}}</option>
                                   @endforeach
                               </select>
                            </div>
  
                            <div class="form-grup">
                                <label for="">Masukan Harga</label>
                         
                                <input type="text" name="harga_kamar" class="form-control" required>
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
@push('script')
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('.pilih-type_kamar').select();
        });
    </script>
@endpush
