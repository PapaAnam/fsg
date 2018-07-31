<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    public $timestamps = false;
    protected $table = 'marketplace';
    protected $fillable = ['nama'];

    public function scopeSelectMode($q)
    {
    	$data = [];
    	$data[] = [
    		'text'=>'Pilih Marketplace',
    		'value'=>''
    	];
    	foreach ($q->get() as $d) {
    		$data[] = [
    			'text'=>$d->nama,
    			'value'=>$d->id,
    		];
    	}
    	return $data;
    }
}
