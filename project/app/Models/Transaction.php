<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'transaction'; // ชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'trans_id'; // Primary key ของตาราง
    protected $fillable = [
        'amount', 'trans_date', 'trans_time'
    ];

}
