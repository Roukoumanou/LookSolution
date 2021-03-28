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
class NewCategoryController extends AbstractController
{
    /**
     * @Route("/new/category", name="new_category", methods={"GET","POST"})
     */
    public function newCategory(Request $request, EntityManagerInterface $em): Response
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($category);
            $em->flush();

            $this->addFlash(
                'success',
                'Catégorie ajoutée !'
            );

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin_home/new_category/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
