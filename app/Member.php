<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

	public $table = 'member';

	protected $fillable = [
		'nama_ktp',
		'no_telp',
		'no_rek',
		'atas_nama',
		'id_bank',
		'id_user'
	];

	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('App\User', 'id_user');
	}

	public function bank()
	{
		return $this->belongsTo('App\Bank', 'id_bank');
	}

	public function scopeSelectMode($q)
    {
    	$data = [];
    	$data[] = [
    		'text'=>'Pilih Member',
    		'value'=>''
    	];
    	foreach ($q->get() as $d) {
    		$data[] = [
    			'text'=>$d->nama_ktp,
    			'value'=>$d->id,
    		];
    	}
    	return $data;
    }
}
