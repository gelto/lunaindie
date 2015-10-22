<?php

class Color extends Eloquent {
	public function prenda()
    {
        return $this->belongsTo('Prenda');
    }
}