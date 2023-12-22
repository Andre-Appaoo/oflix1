<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtworkController extends AbstractController
{
    private GenreRepository $genreRepository;
    private ArtworkRepository $artworkRepository;

    public function __construct(GenreRepository $genreRepository, ArtworkRepository $artworkRepository)
    {
        $this->genreRepository = $genreRepository;
        $this->artworkRepository = $artworkRepository;
    }

    #[Route('/films-series', name: 'app_artwork')]
    public function index(): Response
    {
        return $this->render('artwork/index.html.twig', [
            'genreList' => $this->genreRepository->findAll(),
            'artworkList' => $this->artworkRepository->findAll()
        ]);
    }

    #[Route('/artwork/{id}', name: 'app_artwork-show')]
    public function show(int $id): Response
    {
        return $this->render('artwork/artworkDetails.html.twig', [
            'artwork' => $this->artworkRepository->find($id)
        ]);
    }
}
