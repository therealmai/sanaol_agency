<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
        'location',
        'date',
        'ref',
        'is_deleted'
    ];
        
    //Can be used to retrieve the user in the news 
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function PreviewNews(){
        return $this->hasOne(PreviewNews::class, 'news_id');
    }
}
