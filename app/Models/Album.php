<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Album extends Model
// {

//     protected $table = 'allalbums';


//     public function band()
//     {
//         return $this->belongsTo(AllBand::class, 'all_band_id');
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'allalbums';  // Corrigir o nome da tabela

    protected $fillable = [
        'nome',
        'imagem',
        'data_de_lancamento',
        'band_id', // A chave estrangeira que faz referência à banda
    ];

    // Relacionamento inverso: um álbum pertence a uma banda
    public function banda()
    {
        return $this->belongsTo(AllBand::class, 'band_id'); // 'band_id' é a chave estrangeira
    }
}

