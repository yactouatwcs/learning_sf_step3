<?php

namespace App\Service;

use App\Entity\Offer;
use App\Entity\Product;
use App\Entity\User;

class PriceCalculator
{
   public function personalPrice(User $user, Product $product, Offer $offer): float
   {
       $currentUserDiscount = $user->getLoyaltyDiscount();
       $todaysDiscount = floatval($offer->getDiscount()) ?? 1;
       return $product->getPrice() * min($currentUserDiscount, $todaysDiscount);
   }
}
