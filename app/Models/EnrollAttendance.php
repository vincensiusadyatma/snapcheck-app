<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollAttendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'attendance_id',
        'check_in_time',
        'latitude',
        'longitude',
        'photo',
        'device_info',
        'os_info',
        'ip_address',
    ];
    

    public function user(){
        return $this->belongsTo(User::class);
    }
}
