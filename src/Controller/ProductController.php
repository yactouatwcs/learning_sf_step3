<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\OfferRepository;
use App\Service\PriceCalculator;
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
    public function show(Product $product, PriceCalculator $priceCalculator): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'price' => $priceCalculator->personalPrice($this->getUser(), $product)
        ]);
    }
}
