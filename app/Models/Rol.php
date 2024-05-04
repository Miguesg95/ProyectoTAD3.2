<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    public function users (){
        return $this->hasMany(User::class);
    }

    public function listarUsers (){
        if(count($this->users) == 0){
            echo "No hay usuarios para este Rol";
        }else{
            foreach ($this->users as $user){
                echo "$user->username - $user->email<br>";
            }
        } 
    }

}


