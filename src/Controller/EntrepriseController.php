<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/entreprise/{id}", name="entreprise_detail")
     * @Route("/entreprise/new", name="entreprise_new")
     */
    public function index(Entreprise $entreprise = null)
    {
        if (!$entreprise) {
            $entreprise = new Entreprise();
        }

        $formEntreprise = $this->createForm(EntrepriseType::class, $entreprise);
        
        return $this->render('entreprise/index.html.twig', [
            'formEntreprise' => $formEntreprise->createView(),
            'entreprise' => $entreprise,
        ]);
    }

    /**
     * @Route("/entreprise", name="entreprise_liste")
     */
    public function liste(EntrepriseRepository $repo)
    {
        $entreprises = $repo->findAll();

        return $this->render('entreprise/liste.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }
}
