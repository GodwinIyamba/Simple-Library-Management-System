<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['book'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'copy_id');
    }

    public function scopeTotal(Builder $query)
    {
        return $query->count();
    }
}
