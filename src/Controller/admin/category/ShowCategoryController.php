<?php

namespace App\Controller\admin\category;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class ShowCategoryController extends AbstractController
{
    /**
     * @Route("/show/category/{id}", name="show_category", methods={"GET"})
     */
    public function showCategory(Category $category): Response
    {
        return $this->render('admin_home/show_categories/show.html.twig', [
            'category' => $category,
        ]);
    }
}
