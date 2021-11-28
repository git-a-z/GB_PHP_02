<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function index($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productRepository = $entityManager->getRepository(Product::class);
        $product = $productRepository->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setClicks($product->getClicks() + 1);
        $entityManager->flush();

        $product = $productRepository->find($id);

        return $this->render('product/index.html.twig', [
            'product' => $product,
        ]);
    }
}
