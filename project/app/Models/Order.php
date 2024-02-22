<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'Order';
    protected $primaryKey = 'order_id';
    const CREATED_AT = 'order_time';
    public $timestamps = false;
    protected $fillable = ['queue_id', 'table_id', 'order_type', 'order_status', 'order_time'];

    // Define the relationship with OrderDetail model
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
