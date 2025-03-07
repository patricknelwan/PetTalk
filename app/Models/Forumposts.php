<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Forum;

class Forumposts extends Model
{
    protected $fillable=['commentcontent','ForumID','Username','CreatedAt','userid'];
    public function forum():hasOne
    {
        return $this->hasOne(Forum::class);
    }
    // use HasFactory;
}
