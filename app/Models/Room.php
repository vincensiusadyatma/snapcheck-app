<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description',
        'capacity',
        'room_type',
        'status'
    ];

    public function roomOwnership()
    {
        return $this->hasOne(RoomOwnership::class, 'room_id');
    }

 
}
