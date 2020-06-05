<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'document', 'street', 'number', 'neighborhood', 'state', 'phone', 'status'];

    
    public function getResults($data, $total)
    {
        if (!isset($data['filter']) && !isset($data['name']) && !isset($data['email'])){
            return $this->paginate($total);
        }

        return $this->where(function($query) use ($data){
           
            if (isset($data['name'])){
               $filter = $data['name'];
               $query->where('name', 'LIKE', "%{$filter}%");
            }

            if (isset($data['email'])){
                $filter = $data['email'];
                $query->where('email', 'LIKE', "%{$filter}%");
             }
        })
        ->paginate($total);
    }
    
    public function essays(){
        return $this->HasMany(Essay::class);
    }

    public function payments(){
        return $this->HasMany(Payment::class);
    }


   

}

