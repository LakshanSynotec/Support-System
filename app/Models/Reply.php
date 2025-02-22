<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model {
    use HasFactory;

    protected $fillable = ['ticket_id', 'message'];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}