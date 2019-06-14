<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Browsershot\Browsershot;
use Spatie\Image\Manipulations;

class Project extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'url',
    ];

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
        try {
            $pathToImage = storage_path('app/public/' . $this->name . '.jpg');
            Browsershot::url($value)
                ->windowSize(1920, 1080)
                ->fit(Manipulations::FIT_CONTAIN, 400, 400)
                ->save($pathToImage);

            $this->image = '/storage/' . $this->name . '.jpg';
        } catch (\Throwable $e) {
            $this->image = 'https://dummyimage.com/400x255/ff7f7f/333333.png&text=' . $this->name;
        }


    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
