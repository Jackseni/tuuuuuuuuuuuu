<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Risk extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner','cost','prevention','action'
    ];


    const FREQUENCY = [
        ['id' => 1,'name' =>  'Improbable','label' => 'Sucede una vez por año'],
        ['id' => 2,'name' =>  'Posible','label' => 'Sucede una vez por semestre'],
        ['id' => 3,'name' =>  'Ocasional','label' => 'Sucede una vez por trimestre'],
        ['id' => 4,'name' =>  'Probable','label' => 'Sucede una vez por mes'],
        ['id' => 5,'name' =>  'Frecuente','label' => 'Sucede varias veces en un mes'],
    ];

    const IMPACT = [
        ['id' => 1,'name' =>  'Insignificante','label' => 'Generaría pérdidas de 20 dólares o menos'],
        ['id' => 2,'name' =>  'Menor','label' => 'Generaría pérdidas entre 21 dólares y 100 dólares'],
        ['id' => 3,'name' =>  'Moderado','label' => 'Generaría pérdidas entre 101 y 1000 dólares'],
        ['id' => 4,'name' =>  'Moderado','label' => 'Generaría pérdidas entre 1001 y 5000 dólares'],
        ['id' => 5,'name' =>  'Mayor','label' => 'Generaría pérdidas de mas de 5000 dólares'],
    ];

    const ACTION = [
        ['id' => 1,'name' =>  'Evitar','color' => 'danger'],
        ['id' => 2,'name' =>  'Transferir','color' => 'info'],
        ['id' => 3,'name' =>  'Mitigar','color' => 'warning'],
        ['id' => 4,'name' =>  'Aceptar','color' => 'success']
    ];

    const OWNERS = [
        ['id' => 1,'name' => 'IT'],
        ['id' => 2,'name' => 'Jefe de Proyectos'],
        ['id' => 3,'name' => 'Base de datos'],
        ['id' => 4,'name' => 'Ciberseguridad'],
        ['id' => 5,'name' => 'Desarrollo'],
    ];

    const COSTS = [
        ['id' => 1,'name' => 'Alto'],
        ['id' => 2,'name' => 'Medio'],
        ['id' => 3,'name' => 'Bajo']
    ];

    const PREVENTIONS = [
        ['id' => 1,'name' => 'Capacitar al personal'],
        ['id' => 2,'name' => 'Hacer una auditoria de los ordenadores'],
        ['id' => 3,'name' => 'Crear un backup']
    ];


    const GREEN = 'success';
    const YELLOW = 'warning';
    const RED = 'danger';
    const BLUE = 'primary';


    protected $appends = [
        'short_name'
    ];

    public function card(){
        return $this->belongsTo(Card::class);
    }

    public function process(){
        return $this->belongsTo(Process::class);
    }

    public function ShortName() : Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) =>  Str::limit($attributes['name'],25)
        );

    }

    public function contingencies(){
        return $this->belongsToMany(Contingency::class);
    }
}
