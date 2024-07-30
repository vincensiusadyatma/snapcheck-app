<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id'
      
    ];

    public function room() {
        return $this->belongsTo(Room::class);
    }

}
