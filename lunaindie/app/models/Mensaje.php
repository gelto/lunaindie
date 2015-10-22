<?php

class Mensaje extends Eloquent {
	public function usuario()
    {
        return $this->belongsTo('User');
    }
}