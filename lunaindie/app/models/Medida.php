<?php

class Medida extends Eloquent {
	public function prenda()
    {
        return $this->belongsTo('Prenda');
    }

}