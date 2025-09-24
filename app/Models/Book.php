<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $fillable = [
        'title',
        'isbn',
        'description',
        'pages',
        'quantity',
        'author_id',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function isbn(): string
    {
        if (Str::doesntContain($this->isbn, '-')) {
            return preg_replace('/^(\d{3})(\d{2})(\d{5})(\d{2})(\d{1})$/', '$1-$2-$3-$4-$5', str_replace('-', '', $this->isbn));
        }

        return $this->isbn;
    }
    //
}
