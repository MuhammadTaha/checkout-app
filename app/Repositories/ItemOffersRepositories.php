<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\ItemOffers;

class ItemOffersRepositories
{
    public function getItemOffers(Item $item)
    {
        return ItemOffers::where('item_id', $item->id)->get();
    }
}
