<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    protected $fillable = [
    	'no_kamar',
    	'nama_kamar',
        'type_kamar',
        'harga_kamar'
      
    ];
     public function booking()
    {
    	return $this->hasMany(Booking::class );
    }
    public function typekamar()
    {
    	return $this->belongsTo(Type_Kamar::class,'type_kamar');
    }
    public function kunci()
    {
    	return $this->hasOne(Kunci::class);
    }
    public function pelanggan()
    {
    	return $this->hasMany('App\Pelanggan',
                                'pelanggan_kamar',
                                 'kamar_id',
                                 'pelanggan_id');
    }
    public $timestamps = true;
}
 