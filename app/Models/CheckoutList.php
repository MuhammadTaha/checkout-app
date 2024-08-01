<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutList extends Model
{
    use HasFactory;

    public Item $item;
    public $orderList;
    public float $totalPrice;


    public $fillable = [
        'item',
        'orderList',
        'totalPrice'
    ];

    public function __construct(Item $item, $orderList = [], float $totalPrice)
    {
        $this->item = $item;
        $this->orderList = $orderList;
        $this->totalPrice = $totalPrice;
    }
}
