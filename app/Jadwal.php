<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
	public $table = 'jadwal_flash_sale';
	protected $appends = ['fee_rp'];

	protected $fillable = [
		'waktu',
		'produk',
		'fee',
		'id_marketplace',
	];

	public function marketplace()
	{
		return $this->belongsTo('App\Marketplace', 'id_marketplace');
	}

	public function getFeeRpAttribute()
	{
		return number_format($this->fee, 0, ',', '.');
	}

	public function scopeSelectMode($q)
    {
    	$data = [];
    	$data[] = [
    		'text'=>'Pilih ID Jadwal',
    		'value'=>''
    	];
    	foreach ($q->get() as $d) {
    		$data[] = [
    			'text'=>$d->id,
    			'value'=>$d->id,
    		];
    	}
    	return $data;
    }
}
