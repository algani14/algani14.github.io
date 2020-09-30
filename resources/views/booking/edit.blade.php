@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Booking</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <form action="{{route('booking.update',$booking->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
							<div class="form-grup">
                                <label for="">check in</label>
              
                                <input type="date" value="{{$booking->check_in}}" name="check_in" class="form-control" required>
                            </div>
                            <div class="from-grup">
                                    <label for="">Nama Pelanggan</label>
                                
                                    <select name="pelanggan_id" id="" class="form-control">
                                        @foreach ($pelanggan as $item)
                                            <option value="{{$item->id}}"{{$item->id==$booking->pelanggan_id ?'selected':''}}>
                                                {{$item->nama}}
                                            </option>
                                        @endforeach
                                   </select>
                                </div>
                            <div class="from-grup">
                                <label for="">type kamar </label>
							
                                <select name="kamar_id" id="" class="form-control">
                                    @foreach ($kamar as $item)
                                        <option value="{{$item->id}}"{{$item->id==$booking->kamar_id ?'selected':''}}>
                                            {{$item->nama_kamar}}-{{$item->typekamar->lantai}}
                                        </option>
                                    @endforeach
                               </select>
                            </div>
						
							</div>
                            <div class="from-grup">
                                <label for="">check out</label>
                        
                                <input type="date" value="{{$booking->check_out}}" name="check_out" class="form-control" required>
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
