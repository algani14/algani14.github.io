<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $fillable = [
    	
    	'nama',
    	'email',
    	'no_telp',
        'alamat',
        
    ];
     public function booking()
    {
    	return $this->hasMany(Booking::class);
    }
    public function kunci()
    {
    	return $this->hasMany(Kunci::class);
    }
    public function kamar()
    {
        return $this->belongsToMany('App\Kamar',
                                    'pelanggan_kamar',
                                    'pelanggan_id',
                                    'kamar_id');
    }
    
    public $timestamps = true;
}
