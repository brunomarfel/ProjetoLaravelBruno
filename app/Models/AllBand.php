<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class AllBand extends Model
// {
//     use HasFactory;

//     protected $table = 'allbands'; // Nome correto da tabela

//     protected $fillable = [
//         'nome',
//         'foto',
//         'numero_de_albuns',
//     ];

// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllBand extends Model
{
    use HasFactory;

    protected $table = 'allbands'; // Nome correto da tabela

    protected $fillable = [
        'nome',
        'foto',
        'numero_de_albuns',
    ];

    // Definindo o relacionamento com os álbuns
    public function albuns()
    {
        return $this->hasMany(Album::class, 'band_id'); // Defina a chave estrangeira 'band_id' em albums
    }
}

