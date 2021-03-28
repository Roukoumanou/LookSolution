<?php

namespace App\Controller\admin\article;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class ArticleListController extends AbstractController
{
    /**
     * @Route("/articles", name="articles", methods={"GET"})
     */
    public function List(ArticleRepository $repository): Response
    {
        // dd($repository->findAll());

        return $this->render('admin_home/article_list/list.html.twig', [
            'articles' => $repository->findAll(),
        ]);
    }
}
