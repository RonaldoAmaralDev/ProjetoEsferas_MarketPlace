<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produto_id',
        'observacao',
        'quantidade',
        'valor_unitario',
        'valor_total',
        'status',
        'cliente_id'
    ];

    protected $hidden = ['id'];
    protected $table = 'pedidos';
}
