<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviewEvent extends Model
{
    use HasFactory;

    protected $table = "preview_events";

    public function Events(){
        return $this->belongsTo(Events::class, 'event_id');
    }
}
