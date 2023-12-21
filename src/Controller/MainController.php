<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\GenresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private GenresRepository $genresRepository;
    private ArtworkRepository $artworkRepository;

    public function __construct(GenresRepository $genresRepository, ArtworkRepository $artworkRepository)
    {
        $this->genresRepository = $genresRepository;
        $this->artworkRepository = $artworkRepository;
    }

    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'genreList' => $this->genresRepository->findAll(),
            'artworkList' => $this->artworkRepository->findAll()
        ]);
    }
}