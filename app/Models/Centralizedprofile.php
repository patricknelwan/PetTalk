<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centralizedprofile extends Model
{
    use HasFactory;
    protected $fillable=['userid','adoptionid','profileimage','adoptiondescription','transport'];
}
