<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InvitationController extends AbstractController
{
    /**
     * @Route("/invitation", name="invitation")
     */
    public function index()
    {
        return $this->render('invitation/index.html.twig', [
            'controller_name' => 'InvitationController',
        ]);
    }
}
