@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pelanggan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('pelanggan.update',$pelanggan->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
							<div class="form-grup">
                                <label for="">Nama</label>
              
                                <input type="text" value="{{$pelanggan->nama}}" name="nama" class="form-control" required>
                            </div>
                            <div class="from-grup">
                                <label for="">Email</label>
                        
                                <input type="text" value="{{$pelanggan->email}}" name="email" class="form-control" required>
                            </div>
                            <div class="table-responsive">
                                <div class="form-grup">
                                    <label for="">No Telepon</label>   
                                    <input type="text" name="no_telp" value="{{$pelanggan->no_telp}}" class="form-control" required>
                                </div>


                            <div class="table-responsive">
                                <div class="form-grup">
                                    <label for="">Alamat</label>   
                                    <input type="text" name="alamat" value="{{$pelanggan->alamat}}" class="form-control" required>
                                </div>
                                <div class="table-responsive">
                                    <div class="form-grup">
                                        <label for="">Nama</label>   
                                        <input type="text" name="alamat" value="{{$pelanggan->alamat}}" class="form-control" required>
                                    </div>
                                    <div class="form-grup">
                                        <label for="">Pilih Kamar</label>
      
                                           <select id="js-multiple" class="form-control pilih-nama_kamar" multiple='multiple' name="nama_kamar[]">
                                               @foreach ($kamar as $item)
                                           <option value="{{$item->id}}"{{(in_array($item->id , $select)) ? 'select="select"':''  }}>{{$item->nama_kamar}}</option>
                                               @endforeach
                                           </select>
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