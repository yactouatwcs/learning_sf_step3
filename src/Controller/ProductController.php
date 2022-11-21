<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/products/{id}', name: 'app_product')]
    public function show(Product $product, OfferRepository $offerRepository): Response
    {
        // die(date('z'));
        $usr = $this->getUser();

        $todaysOffer = $offerRepository->findSpecialOfferForToday();
        $usrDiscount = floatval($usr->{'getLoyaltyDiscount'}());

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'price' => $product->getPrice() * min($usrDiscount, floatval($todaysOffer->getDiscount()))
        ]);
    }
}
