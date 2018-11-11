<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Document;
use App\Form\Type\DocumentType;
use App\Repository\DocumentRepository;

class DocumentController extends AbstractController
{
    /**
     * @Route("/document/{id}", name="document_detail")
     * @Route("/document/new", name="document_new")
     */
    public function index(Document $document = null, Request $request, ObjectManager $manager)
    {
        if (!$document) {
            $document = new Document();
        }
        $manager = $this->getDoctrine()->getManager();

        $formDocument = $this->createForm(DocumentType::class, $document);
        $formDocument->handleRequest($request);

        if ($formDocument->isSubmitted() && $formDocument->isValid()) {
            if (!$document->getId()) {
                $document->setCreatedAt(new \DateTime());
                $document->setCreatedBy("Michel-Creat");
            }

            $manager->persist($document);
            $manager->flush();

            return $this->redirectToRoute('document_detail', ['id'=> $document->getId()]);
        }
        
        return $this->render('document/index.html.twig', [
            'formDocument' => $formDocument->createView(),
            'document' => $document,
        ]);
    }

    /**
     * @Route("/document", name="document_liste")
     */
    public function liste(DocumentRepository $repo)
    {
        $documents = $repo->findAll();

        return $this->render('document/liste.html.twig', [
            'documents' => $documents,
        ]);
    }
}
