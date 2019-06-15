<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'url',
        'category',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($image)
    {
        return $image ?? 'https://dummyimage.com/400x255/ff7f7f/333333.png&text=' . $this->name;
    }
}
