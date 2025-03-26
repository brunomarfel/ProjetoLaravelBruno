<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    protected $table = 'allalbums';


    public function band()
    {
        return $this->belongsTo(AllBand::class, 'all_band_id');
    }
}

