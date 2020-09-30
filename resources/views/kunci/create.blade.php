@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('kunci.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">no kamar</label>
                                   <select name="kamar_id"  class="form-control pilih-nomer_kunci" name="kamar_id[]">
                                       @foreach ($kamar as $item)
                                         <option value="{{$item->id}}">{{$item->no_kamar}}</option>
                                       @endforeach
                                   </select>
                                </div>

                            <div class="form-grup">
                            <label for="">nama pelanggan</label>
                               <select name="pelanggan_id"  class="form-control pilih-nama_pelanggan" name="pelanggan_id[]">
                                   @foreach ($pelanggan as $item)
                                     <option value="{{$item->id}}">{{$item->nama}}</option>
                                   @endforeach
                               </select>
                            </div>
  
                            <div class="form-grup">
                                <label for="">merk kunci</label>
                         
                                <input type="text" name="merk_kunci" class="form-control" required>
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
