<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";

    protected $fillable = [
        'title',
        'content',
        'image',
        'ref',
        'is_deleted'
    ];

    //Can be used to retrieve the user using the service
    public function User(){
        return $this->belongsTo(User::class);
    }
}
