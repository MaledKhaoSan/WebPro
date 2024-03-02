<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'table'; // ชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'table_id'; // Primary key ของตาราง
    protected $fillable = [
        'table_size', 'table_status',
    ];

}
