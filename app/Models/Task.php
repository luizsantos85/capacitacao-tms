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

    public function search($data, $totalPage)
    {
        $tasks = $this->when(isset($data['status']), function ($query) use ($data) {
            return $query->where('status', $data['status']);
        })
        ->when($data['search'] != null, function ($query) use ($data) {
            return $query->where('title', 'LIKE', "%{$data['search']}%")
            ->orWhere('description', 'LIKE', "%{$data['search']}%");
        })
        ->where('user_id', auth()->user()->id)
        ->paginate($totalPage);

        return $tasks;
    }

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
