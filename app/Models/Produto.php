<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'imagem',
        'preco',
        'descricao',
        'quantidade',
        'categoria_id',
    ];

    public function Categoria(){
        return $this -> belongsTo(Categoria::class,'categoria_id');
    }

}
