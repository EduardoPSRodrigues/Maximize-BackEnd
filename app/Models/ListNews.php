<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'texto_completo',
        'imagem',
        'data_de_publicacao',
    ];

    protected $hidden = ['updated_at', 'created_at'];

}
