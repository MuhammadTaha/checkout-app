<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOffers extends Model
{
    use HasFactory;

    protected $table = 'item_offers';

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
