<?php

class Imagenesporprenda extends Eloquent {
	public function prenda()
    {
        return $this->belongsTo('Prenda');
    }
}