<?php

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
