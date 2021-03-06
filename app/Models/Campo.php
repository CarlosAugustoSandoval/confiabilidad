<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    public function plantas()
    {
        return $this->hasMany(Planta::class);
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    protected $hidden = ['created_at','updated_at'];
}
