<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';
    protected $fillable = [
        'nome', 'data', 'imagem', 'nacionalidade_id'
    ];
}
