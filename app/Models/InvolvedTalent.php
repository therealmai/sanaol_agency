<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvolvedTalent extends Model
{
    use HasFactory;

    protected $table = "involved_talents";

    protected $fillable = [
        'events_id',
        'user_id',
        'is_deleted'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Event(){
        return $this->belongsTo(Event::class);
    }
}
