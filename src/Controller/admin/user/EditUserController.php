<?php

namespace App\Controller\admin\user;

use App\Entity\User;
use App\Form\AddUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class EditUserController extends AbstractController
{
    /**
     * @Route("/edit/user/{id}", name="edit_user", methods={"GET","POST"})
     */
    public function editUser(User $user, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AddUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash(
                'success',
                'Utilisateur modifié !'
            );

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin_home/edite_user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
