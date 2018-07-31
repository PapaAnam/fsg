<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $timestamps = false;
    protected $table = 'bank';
    protected $fillable = ['nama_bank'];
    public function scopeSelectMode($q)
    {
    	$data = [];
    	$data[] = [
    		'text'=>'Pilih Bank',
    		'value'=>''
    	];
    	foreach ($q->get() as $d) {
    		$data[] = [
    			'text'=>$d->nama_bank,
    			'value'=>$d->id,
    		];
    	}
    	return $data;
    }
}
