<?php

namespace App\Controller\admin\article;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class EditArticleController extends AbstractController
{
    /**
     * @Route("/edit/article/{id}", name="edit_article", methods={"GET", "POST"})
     */
    public function editArticle(Article $article, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash(
                'success',
                'Article Modidié et placé dans '.$article->getStatus()
            );

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin_home/edit_article/edit.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }
}
