<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private GenreRepository $genreRepository;
    private ArtworkRepository $artworkRepository;

    public function __construct(GenreRepository $genreRepository, ArtworkRepository $artworkRepository)
    {
        $this->genreRepository = $genreRepository;
        $this->artworkRepository = $artworkRepository;
    }

    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'genreList' => $this->genreRepository->findAll(),
            'artworkList' => $this->artworkRepository->findAll()
        ]);
    }
}
