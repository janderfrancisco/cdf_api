<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{

    protected $fillable = ['essay_id', 'note_id', 'position_top', 'position_left', 'size', 'height', 'rate'];


    public function essay(){
        return $this->BelongsTo(Essay::class);
    }      
    
    public function note(){
        return $this->HasOne(Note::class);
    }

}
