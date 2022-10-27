<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_contato'];
}
