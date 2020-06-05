<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    public function student(){
        return $this->BelongsTo(Student::class);
    }   

    public function annotations(){
        return $this->HasMany(Annotation::class);
    }   
}
