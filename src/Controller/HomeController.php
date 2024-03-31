<?php

namespace App\Controller;

use App\Entity\Art;
use App\Form\InsertArtType;
use App\Repository\ArtRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index', methods:['GET'])]
    public function index(ArtRepository $repository): Response
    {
        $arts = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'arts' => $arts

        ]);
    }

    #[Route('/new', 'home.new', methods:['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager) : Response
    {
        $art = new Art();
        $form = $this->createForm(InsertArtType::class, $art);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('picture_link')->getData(); // recupère l'image
            $fileName = $file->getClientOriginalName(); //. '.' . $file->getClientOriginalExtension(); // renome l'image
            $file->move($this->getParameter('kernel.project_dir') . '/public/art/images', $fileName); // crée le lien vers l'image avec le nom de l'image

            $art->setPictureLink($fileName); // change le nom de l'image par son nom dans la base de donnée

            $manager->persist($art);
            $manager->flush();

            return $this->redirectToRoute('home.index');
        }

        return $this->render('home/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}