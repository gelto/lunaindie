<?php

class Prenda extends Eloquent {
    public function imagenPrincipal(){
        return $this->hasMany('Imagenesporprenda', 'prenda_id', 'id');
    }
    public function imagenes(){
        return $this->hasMany('Imagenesporprenda', 'prenda_id', 'id');
    }
    public function categoria(){
        return $this->belongsTo('Categoria', 'categoria_id', 'id');
    }
    public function usuario()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function medidas()
    {
        return $this->hasMany('Medida');
    }

    public function colors()
    {
        return $this->hasMany('Color');
    }

    public function inventarios()
    {
        return $this->hasMany('Inventario');
    }
}