<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Define los campos que pueden ser asignados en masa
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image_url',
    ];

    // Relación: un blog pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
