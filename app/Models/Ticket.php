<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
    use HasFactory;

    protected $fillable = ['customer_name', 'email', 'phone', 'problem_description', 'reference_number', 'status'];

    public function replies() {
        return $this->hasMany(Reply::class);
    }
}