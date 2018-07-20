<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Form\AnnounceType;
use App\Repository\AnnounceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/search")
 */
class SearchController extends Controller
{
    /**
     * @Route("/", name="announce_findall", methods="GET")
     */
    public function findAllAnnounce(AnnounceRepository $announceRepository): Response
    {
        return $this->render('search.html.twig', ['announces' => $announceRepository->findAll()]);
    }

}
