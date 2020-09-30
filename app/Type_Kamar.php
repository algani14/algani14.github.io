<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Kamar extends Model
{
    protected $table = 'type_kamars';

    protected $fillable = [
    	'type_kamar',
        'keterangan',
        'lantai'
    ];

	public function kamar()
    {
    	return $this->hasMany(Kamar::class);
    }
    public function booking()
    {
    	return $this->hasMany(Booking::class);
    }
}

