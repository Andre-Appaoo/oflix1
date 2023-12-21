<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtworkController extends AbstractController
{
    private ArtworkRepository $artworkRepository;

    public function __construct(ArtworkRepository $artworkRepository)
    {
        $this->artworkRepository = $artworkRepository;
    }

    #[Route('/artwork', name: 'app_artwork')]
    public function index(): Response
    {
        return $this->render('artwork/index.html.twig', [
            'controller_name' => 'ArtworkController',
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
