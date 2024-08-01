<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\ItemOffers;

class ItemOffersRepositories
{
    public function getItemOffers(Item $item)
    {
        return ItemOffers::where('items_id', $item->id)->get();
    }
}
