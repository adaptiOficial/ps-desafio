<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'nome', 'preco', 'descricao', 'quantidade', 'imagem', 'categoria_id '
    ];
}
