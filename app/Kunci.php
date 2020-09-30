<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kunci extends Model
{
    Protected $table = 'kuncis';
    protected $fillable = ['kamar_id','pelanggan_id','merk_konci'];
    public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class);
	}
	public function kamar()
	{
		return $this->belongsTo(Kamar::class);
	}
	
    public $timestamps = true;
}
