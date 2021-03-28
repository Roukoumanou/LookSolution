<?php

namespace App\Controller\admin\article;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class ArticleShowController extends AbstractController
{
    /**
     * @Route("/article/show/{id}", name="show_article", methods={"GET"})
     */
    public function showArticle(Article $article): Response
    {
        return $this->render('admin_home/article_show/show.html.twig', [
            'article' => $article,
        ]);
    }
}
