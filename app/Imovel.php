<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $fillable = ['titulo','descricao','status','endereco','cep','valor','dormitorio','detalhes','visualizacoes','publicar','mapa']; 
    protected $table="imoveis";

    public function tipo(){
    	return $this->belongsTo('App\Tipo','tipo_id');
    }

    public function cidade(){
    	return $this->belongsTo('App\Cidade','cidade_id');
    }

    public function galeria(){
    	return $this->hasMany('App\Galeria','imovel_id');
    }
}
