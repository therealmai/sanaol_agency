<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviewNews extends Model
{
    use HasFactory;

    protected $table = "preview_news";

    public function News(){
        return $this->belongsTo(News::class, 'news_id');
    }
}
