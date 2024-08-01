<?php

namespace App\Services;

use App\Models\Item;
use App\Models\ItemOffers;

class ItemOffersService
{
    public function getItemOffers(Item $item)
    {
        return ItemOffers::where('items_id', $item->id)->get();
    }
}
