<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
    	'check_in',
    	'pelanggan_id',
    	'kamar_id',
    	'check_out'
    ];
    public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class);
	}
	public function kamar()
	{
		return $this->belongsTo(Kamar::class);
	}
	public function typekamar()
	{
		return $this->belongsTo(Kamar::class);
	}
	
    public $timestamps = true;
}
