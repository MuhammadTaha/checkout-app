<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemOffers;
use App\Repositories\ItemOffersRepositories;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $itemOffersRepositories;

    public function __construct(ItemOffersRepositories $itemOffersRepositories) {
        $this->itemOffersRepositories = $itemOffersRepositories;
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'items_id' => 'required|integer',
            'order_list' => 'required|array',
            'total_amount' => 'required|numeric',
        ]);

        $data = json_encode($request->all());


        $itemOffers = $this->itemOffersRepositories->getItemOffers(Item::find($request->items_id));





        return response()->json($itemOffers);
    }

    public function removeItem(Request $request)
    {
        $itemOffer = ItemOffers::find($request->item_offer_id);
        $itemOffer->delete();
        return response()->json($itemOffer);
    }
}
