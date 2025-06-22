<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image_url',
        'status',
        'category_id'
    ];

    /**
     * Relacionamento: Um livro pertence a uma categoria
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessor para status formatado
     */
    public function getStatusFormattedAttribute()
    {
        $statuses = [
            'want_to_read' => 'Quero Ler',
            'reading' => 'Lendo',
            'read' => 'Lido'
        ];

        return $statuses[$this->status] ?? $this->status;
    }
}
