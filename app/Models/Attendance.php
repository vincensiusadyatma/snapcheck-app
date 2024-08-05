<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'room_id'
    ];
    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function enrollAttendances(){
        $this->hasMany(EnrollAttendance::class);
    }

    protected $casts = [
        'end_time' => 'datetime',
    ];
}
