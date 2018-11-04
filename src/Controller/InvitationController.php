<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Invitation;
use App\Form\InvitationType;
use App\Repository\InvitationRepository;

class InvitationController extends AbstractController
{
    /**
     * @Route("/invitation/{id}", name="invitation_detail")
     * @Route("/invitation/new", name="invitation_new")
     */
    public function index(Invitation $invitation = null)
    {
        if (!$invitation) {
            $invitation = new Invitation();
        }

        $formInvitation = $this->createForm(InvitationType::class, $invitation);
        
        return $this->render('invitation/index.html.twig', [
            'formInvitation' => $formInvitation->createView(),
            'invitation' => $invitation,
        ]);
    }

    /**
     * @Route("/invitation", name="invitation_liste")
     */
    public function liste(InvitationRepository $repo)
    {
        $invitations = $repo->findAll();

        return $this->render('invitation/liste.html.twig', [
            'invitations' => $invitations,
        ]);
    }
}
