<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";

    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
        'event_type',
        'location',
        'date',
        'ref',
        'is_deleted'
    ];

    public function InvolvedTalent(){
        return $this->hasMany(InvolvedTalent::class, 'events_id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
