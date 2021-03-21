<?php

namespace App\Controller\admin\category;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class EditCategoryController extends AbstractController
{
    /**
     * @Route("/edit/category/{id}", name="edit_category", methods={"GET","POST"})
     */
    public function editCategory(Category $category, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash(
                'success',
                'Catégorie Modifiée !'
            );

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin_home/edit_category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }
}
