<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';
	protected $fillable = [
		'id_order',
		'id_member',
		'id_jadwal',
		'status',
		'bukti',
		'no_resi',
		'kurir',
	];

	public function member()
	{
		return $this->belongsTo('App\Member', 'id_member');
	}

	public function jadwal()
	{
		return $this->belongsTo('App\Jadwal', 'id_jadwal');
	}
}
