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
        'location',
        'photo',
    ];
}
