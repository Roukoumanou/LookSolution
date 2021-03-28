<?php

namespace App\Controller\admin\user;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class UsersListController extends AbstractController
{
    /**
     * @Route("/users/list", name="users_list", methods={"GET"})
     */
    public function lsUsers(UserRepository $userRepo): Response
    {
        return $this->render('admin_home/users_list/index.html.twig', [
            'users' => $userRepo->findAll(),
        ]);
    }
}
