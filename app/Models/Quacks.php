<?php

namespace App\Models;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quacks extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'tags'];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
