<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    // Função de apoio
    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->description, 100, '...');
    }

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
