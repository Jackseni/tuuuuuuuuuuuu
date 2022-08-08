<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contingency extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public const CONTINGENCIES = [
        ['id' => 1, 'description' => 'Plan de Contingencia Evitar'],
        ['id' => 2, 'description' => 'Plan de Contingencia Transferir'],
        ['id' => 3, 'description' => 'Plan de Contingencia Mitigar'],
        ['id' => 4, 'description' => 'Plan de Contingencia Aceptar']
    ];


    public function risks()
    {
        return $this->belongsToMany(Risk::class);
    }

}
