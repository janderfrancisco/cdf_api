<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['title', 'qtd', 'price'];

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
    
}
