<?php

class Inventario extends Eloquent {
	public function prenda()
    {
        return $this->belongsTo('Prenda');
    }

    public function medida(){
        return $this->belongsTo('Medida');
    }

    public function color(){
        return $this->belongsTo('Color');
    }
}