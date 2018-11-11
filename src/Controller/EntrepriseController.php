<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Entreprise;
use App\Form\Type\EntrepriseType;
use App\Repository\EntrepriseRepository;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/entreprise/{id}", name="entreprise_detail")
     * @Route("/entreprise/new", name="entreprise_new")
     */
    public function index(Entreprise $entreprise = null, Request $request, ObjectManager $manager)
    {
        if (!$entreprise) {
            $entreprise = new Entreprise();
        }

        $formDetail = $this->createForm(EntrepriseType::class, $entreprise);
        $formDetail->handleRequest($request);

        if ($formDetail->isSubmitted() && $formDetail->isValid()) {
            $this->setDefault($entreprise);

            // Mise à jour de la base de données
            $manager->persist($entreprise);
            $manager->flush();

            return $this->redirectToRoute('entreprise_detail', ['id'=> $entreprise->getId()]);
        }
        
        return $this->render('entreprise/index.html.twig', [
            'formDetail' => $formDetail->createView(),
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

    private function setDefault(Entreprise $entreprise) {
        if ($entreprise->getId()) {
            $entreprise->setModifiedAt(new \DateTime());
            $entreprise->setModifiedBy("Michel-Modif");
        }
        else {
            $entreprise->setCreatedAt(new \DateTime());
            $entreprise->setCreatedBy("Michel-Creat");
        }
        if ($entreprise->getGroupe() === null) $entreprise->setGroupe('');
        if ($entreprise->getContacts() === null) $entreprise->setContacts('');
        if ($entreprise->getConventionCollective() === null) $entreprise->setConventionCollective('');
        if ($entreprise->getTrancheEffectif() === null) $entreprise->setTrancheEffectif('');
        if ($entreprise->getNbAdherents() === null) $entreprise->setNbAdherents(-1);
        if ($entreprise->getNotes() === null) $entreprise->setNotes('');
    }
}
