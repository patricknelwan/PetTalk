<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopsi extends Model
{
    protected $fillable=['image','name','description','age','breed','creatorid'];
    protected $primaryKey='id';
    use HasFactory;
}
