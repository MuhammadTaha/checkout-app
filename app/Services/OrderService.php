<?php

namespace App\Services;

use App\Models\Item;
use App\Models\ItemOffers;
use Illuminate\Support\Arr;

class OrderService
{

    private $itemOffersService;
    public function __construct(ItemOffersService $itemOffersService)
    {
        $this->itemOffersService = $itemOffersService;
    }

    public function updatePrices(Item $item, $orderList, $totalPrice)
    {

        $itemOffers = $this->itemOffersService->getItemOffers($item);

        $addedItem = Arr::first($orderList, function ($listItem) use ($item) {
            return $listItem["items_id"] == $item->id;
        });

        if ($addedItem) {
            // increasing the quantity of the item
            $addedItem['quantity'] += 1;
            // calculate offer
            if ($itemOffers->isNotEmpty() && ($addedItem['quantity'] >= $itemOffers[0]->quantity)) {

                $addedItem['price'] = (($addedItem['quantity'] % $itemOffers[0]->quantity) * floatval($item->unit_price) + (floatval($itemOffers[0]->price)) * floor($addedItem['quantity'] / $itemOffers[0]->quantity));
            } else {
                $addedItem['price'] = $addedItem['quantity'] * floatval($item->unit_price);
            }
        }


        // remove the item from the order list
        $orderList = Arr::where($orderList, function ($listItem) use ($item) {
            return $listItem["items_id"] != $item->id;
        });

        array_push($orderList, $addedItem);

        // get sum of price of all items in the order list
        $totalPrice = array_sum(array_column($orderList, 'price'));

        return ["order_list"=>$orderList, "total_amount"=>$totalPrice];
    }
}
