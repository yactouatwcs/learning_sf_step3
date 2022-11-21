<?php

namespace App\Service;

use App\Entity\Product;
use App\Entity\User;
use App\Repository\OfferRepository;

class PriceCalculator
{

    public function __construct(private OfferRepository $offerRepository)
    {
    }

    public function personalPrice(User $user, Product $product): float
    {
        $currentUserDiscount = floatval($user->getLoyaltyDiscount());
        $todaysDiscount = floatval($this->offerRepository->findSpecialOfferForToday()->getDiscount()) ?? 1;
        return $product->getPrice() * min($currentUserDiscount, $todaysDiscount);
    }
}
