<?php

namespace App\Models;

use App\Http\Controllers\Quacks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'tags','quack_id'];

    public function quack()
    {
        return $this->belongsTo(Quacks::class);
    }
}
