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
class NewArticleController extends AbstractController
{
    /**
     * @Route("/new/article", name="new_article", methods={"GET","POST"})
     */
    public function newArticle(Request $request, EntityManagerInterface $em): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setAuthor($this->getUser());

            $em->persist($article);
            $em->flush();

            $this->addFlash(
                'success',
                'Article Ajouté dans '.$article->getStatus()
            );

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin_home/new_article/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
