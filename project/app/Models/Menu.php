<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'Menu'; // ชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'menu_id'; // Primary key ของตาราง
    protected $fillable = [
        'category_id',
        'menu_name',
        'menu_img',
        'price',
        'description',
    ];


    public function category() // ความสัมพันธ์กับโมเดล Category
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
