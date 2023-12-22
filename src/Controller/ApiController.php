<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private GenreRepository $genreRepository;
    private ArtworkRepository $artworkRepository;

    public function __construct(GenreRepository $genreRepository, ArtworkRepository $artworkRepository)
    {
        $this->genreRepository = $genreRepository;
        $this->artworkRepository = $artworkRepository;
    }

    #[Route('/api/artworks', name: 'app_api-artworks')]
    public function getAllArtworks(): JsonResponse
    {
        return $this->json($this->artworkRepository->findAll());
    }

    #[Route('/api/artworks/{id}', name: 'app_api-artwork')]
    public function getArtwork(int $id): JsonResponse
    {
        return $this->json($this->artworkRepository->find($id));
    }

    #[Route('/api/genres', name: 'app_api-genres')]
    public function getAllGenres(): JsonResponse
    {
        return $this->json($this->genreRepository->findAll());
    }

    #[Route('/api/genres/{id}', name: 'app_api-genre')]
    public function getGenre(int $id): JsonResponse
    {
        return $this->json($this->genreRepository->find($id));
    }
}
