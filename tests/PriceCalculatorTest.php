<?php

use App\Entity\Offer;
use App\Entity\Product;
use App\Entity\User;
use App\Service\PriceCalculator;
use PHPUnit\Framework\TestCase;

class PriceCalculatorTest extends TestCase
{
  public function testPersonalPrice(): void
  {
      $product = new Product();
      $user = new User();
      $offer = new Offer();
      $priceCalculator = new PriceCalculator();
      $product->setPrice(10);
      $user->setLoyaltyDiscount(1);
      $offer->setDiscount(1);
      $this->assertEquals(10, $priceCalculator->personalPrice($user, $product, $offer));
      $user->setLoyaltyDiscount(0.8);
      $offer->setDiscount(1);
      $this->assertEquals(8, $priceCalculator->personalPrice($user, $product, $offer));
      $offer->setDiscount(0.5);
      $this->assertEquals(5, $priceCalculator->personalPrice($user, $product, $offer));
  }
}
