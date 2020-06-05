<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{

    public function essay(){
        return $this->BelongsTo(Essay::class);
    }      
    
    public function note(){
        return $this->HasOne(Note::class);
    }

}
