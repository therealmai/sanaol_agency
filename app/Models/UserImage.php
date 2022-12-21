<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    use HasFactory;

    protected $table = "users_images";

    protected $fillable = [
        'image',
        'is_deleted'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
