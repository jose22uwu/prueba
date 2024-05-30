<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $table = 'task';
    public function transformTaskTextToLowerCase(): Attribute //este metodo hace que todo lo escrito se mande en minuscula
    {
        return Attribute::make(
            set: function ($value){ 
             return strtolower($value);}
        );
    }
    protected function casts(): array //es un cast que se hace para que no se vea como 0 o 1, en la bd no afecta
    {
        return [
            'isCompleted' => 'boolean',
            
        ];
        
    }

    public function path(){ return 'task/' .$this->id;}  //este path sirve para un test que hace que se pruebe la funcionalidad de un metodo de un modelo
}
