<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['order', 'title', 'content'];

    public function anootation(){
        return $this->BelongsTo(Anootation::class);
    }
}
