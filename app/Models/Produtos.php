<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'categoria',
        'valor',
        'desconto',
        'status',
        'img'
    ];

    protected $hidden = ['id'];
    protected $table = 'produtos';
}
