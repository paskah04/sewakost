<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";
    protected $fillable = [
        'id_booking','nama_pembooking', 'id_kost', 'tanggal_pembookingan'
    ];
}
