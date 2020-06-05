<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function anootation(){
        return $this->BelongsTo(Anootation::class);
    }
}
