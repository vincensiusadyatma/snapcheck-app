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
        'status',
        'room_code'
    ];

    public function roomOwnership()
    {
        return $this->hasOne(RoomOwnership::class, 'room_id');
    }

    public function enrollRoom(){
        return $this->hasMany(EnrollRoom::class);
    }

    public function attendance(){
        return $this->hasMany(Attendance::class);
    }

 
}
