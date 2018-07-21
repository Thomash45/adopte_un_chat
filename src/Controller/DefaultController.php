<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Repository\AnnounceRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(AnnounceRepository $announceRepository): Response
    {
        return $this->render('index.html.twig', [
            'announces' => $announceRepository->findBy(array(), $orderBy = null, $limit = 3, $offset = null),
            'premium' => $announceRepository->findOneBy(array('is_premium'=>1))
            ]);
    }

    /**
     * @Route("/{id}", name="announce_details", methods="GET")
     */
    public function show(Announce $announce): Response
    {
        return $this->render('details.html.twig', ['announce' => $announce]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }

    /**
     * @Route("/user", name="user")
     */
    public function user()
    {
        return $this->render('User/index.html.twig');
    }


}

