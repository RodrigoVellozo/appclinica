<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    //specialty_id, professional_id, name, cpf, source_id, birthdate e date_time

    protected $fillable = [
        'specialty_id', 'professional_id', 'name', 'cpf', 'source_id', 'birthdate' ,
    ];
}
