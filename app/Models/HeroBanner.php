<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    use HasFactory;

    protected $table = "hero_banners";

    protected $fillable = [
        'header_tal',
        'subheader_tal',
        'header_gen',
        'subheader_gen',
        'preview_events',
        'preview_news',
        'is_deleted'
    ];

    public function BannerImages(){
        return $this->hasMany(BannerImage::class, 'hero_id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
