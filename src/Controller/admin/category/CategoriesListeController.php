<?php

namespace App\Controller\admin\category;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class CategoriesListeController extends AbstractController
{
    /**
     * @Route("/categories/liste", name="categories_liste", methods={"GET"})
     */
    public function listController(CategoryRepository $categoryRepositorie): Response
    {
        return $this->render('admin_home/categories_liste/index.html.twig', [
            'categories' => $categoryRepositorie->findAll(),
        ]);
    }
}
