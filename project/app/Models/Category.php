<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'Category'; // ชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'category_id'; // Primary key ของตาราง
    public $timestamps = false;
    protected $fillable = ['category_name'];
}
