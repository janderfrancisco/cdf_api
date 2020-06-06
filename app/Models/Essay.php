<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
 
    protected $fillable = ['student_id', 'title', 'content', 'file', 'folder'];

    public function getResults($data, $total)
    {
        if (!isset($data['filter']) && !isset($data['name']) && !isset($data['email'])){
            return $this->paginate($total);
        }

        return $this->where(function($query) use ($data){
           
            if (isset($data['title'])){
               $filter = $data['title'];
               $query->where('title', 'LIKE', "%{$filter}%");
            }

        
        })
        ->paginate($total);
    }

    public function student(){
        return $this->BelongsTo(Student::class);
    }   

    public function annotations(){
        return $this->HasMany(Annotation::class);
    }   
}
