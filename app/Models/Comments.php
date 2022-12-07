<?php

namespace App\Models;

use App\Models\User;
use App\Models\Quacks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'tags','quack_id','user_id'];

    public function quack()
    {
        return $this->belongsTo(Quacks::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
