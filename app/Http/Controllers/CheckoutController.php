<?php

namespace App\Http\Controllers;

use App\Models\CheckoutList;
use App\Models\Item;
use App\Models\ItemOffers;
use App\Models\OrderItem;
use App\Models\Response;
use App\Services\ItemOffersService;
use App\Services\OrderService;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    private $itemOffersService;
    private $orderService;

    public function __construct(ItemOffersService $itemOffersService, OrderService $orderService)
    {
        $this->itemOffersService = $itemOffersService;
        $this->orderService = $orderService;
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'items_id' => 'required|integer',
            'order_list' => 'required|array',
            'total_amount' => 'required|numeric',
        ]);

        $item = Item::find($request->items_id);

        if(empty($item)) {
            return response()->json( 'Item not found', 500);
        }
        // create a variable of type CheckoutList
        $updatedCheckoutList = $this->orderService->updatePrices($item, $request->order_list, $request->total_amount);
        return response($updatedCheckoutList, 200);

    }

    // public function removeItem(Request $request)
    // {
    //     $itemOffer = ItemOffers::find($request->item_offer_id);
    //     $itemOffer->delete();
    //     return response()->json($itemOffer);
    // }
}
