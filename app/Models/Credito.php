<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'monto', 'num_cuotas'];


    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id', 'id' );
    }
}
