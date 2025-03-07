<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forumposts;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Forum extends Model
{
    protected $fillable=['ForumTitle','ForumImage','ForumContent','ForumCreator','CreatedAt'];
    protected $guarded=['ForumID'];
    protected $primaryKey='ForumID';
    public function forumpost():HasMany
    {
        return $this->hasMany(Forumposts::class);
    }
    // use HasFactory;
}
