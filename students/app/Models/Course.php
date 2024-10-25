<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table='Courses';
    protected $primaryKey = 'id';
    protected $fillable =['name', 'course', 'duration']; 

    public function duration(){
        return $this->duration .  'Months';
    }


}
