<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Document;
use App\Form\DocumentType;
use App\Repository\DocumentRepository;

class DocumentController extends AbstractController
{
    /**
     * @Route("/document/{id}", name="document_detail")
     * @Route("/document/new", name="document_new")
     */
    public function index(Document $document = null)
    {
        return $this->render('document/index.html.twig', [
            'controller_name' => 'DocumentController',
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
