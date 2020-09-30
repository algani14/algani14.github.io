@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pelanggan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('pelanggan.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <div class="form-grup">
                                <label for="">Masukan nama pelanggan</label>
                            
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-grup">
                                <label for="">Masukan email</label>
                         
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-grup">
                                <label for="">Masukan Nomer Telepon</label>
                         
                                <input type="text" name="no_telp" class="form-control" required>
                            </div>
                            <div class="form-grup">
                                <label for="">Masukan Alamat</label>
                         
                                <textarea class ="form-control" name="alamat" id="" cols="50" rows="10"></textarea>
                            </div>
                            <div class="form-grup">
                                <label for="">Pilih Kamar</label>
                                   <select id="js-multiple" class="form-control pilih-nama_kamar" multiple='multiple' name="nama_kamar[]">
                                       @foreach ($kamar as $item)
                                         <option value="{{$item->id}}">{{$item->nama_kamar}}</option>
                                       @endforeach
                                   </select>
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
            $('.pilih-nama_kamar').select2();
        });
    </script>
@endpush
